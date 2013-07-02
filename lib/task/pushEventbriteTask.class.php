<?php

class pushEventbriteTask extends sfBaseTask {

	protected function configure() {

		// // add your own arguments here
		// $this->addArguments(array(
		//   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
		// ));

		$this->addOptions(array(
		new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
		new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
		new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
		// add your own options here
		));

		$this->namespace        = 'toa';
		$this->name             = 'pushEventbrite';
		$this->briefDescription = 'Push events and tickets to Eventbrite platform';
		$this->detailedDescription = 'Push events and tickets to Eventbrite platform';
	}

	protected function execute($arguments = array(), $options = array()) {

		// initialize the database connection
		$databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'])->getConnection();

		// initialize the main project configuration
		$configuration = ProjectConfiguration::getApplicationConfiguration('eventer', 'prod', true);
		sfContext::createInstance($configuration);

		// push synchronization
		// ** consider try/catch flow here not to break on single error :)
		if($organisers = Doctrine_Core::getTable('Organiser')->getUnsynchronized() and count($organisers)) foreach($organisers as $organiser) $this->pushOrganiser($organiser);
		if($events = Doctrine_Core::getTable('Event')->getUnsynchronized() and count($events)) foreach($events as $event) $this->pushEvent($event);
	}

	// local methods
	protected function pushOrganiser($organiser) {

		$this->logSection('Eventbrite', sprintf('Pushing Organiser ID#%s "%s"...', $organiser->getId(), $organiser->getName()));

		// user login
		$user = $this->logUserIn($organiser->getGuardUser()->getId());

		// send the event to API
		try {
			$organiser->syncForUser($user);
			$this->logSection('Eventbrite', 'OK!');
		}
		catch(sfException $e) {

			$this->logSection('Eventbrite', sprintf('FAIL! %s', $e->getMessage()));
		}
	}
	protected function pushEvent($event) {

		$this->logSection('Eventbrite', sprintf('Pushing Event ID#%s "%s"...', $event->getId(), $event->getTitle()));

		// user login
		$user = $this->logUserIn($event->getOrganiser()->getGuardUser()->getId());

		// send the event to API
		try {

			$event->sendToAPIForUser($user);
			$this->logSection('Eventbrite', 'OK!');
		}
		catch(sfException $e) {

			$this->logSection('Eventbrite', sprintf('FAIL! %s', $e->getMessage()));
		}
	}
	
	// helpers
	private function logUserOut() {

		if(sfContext::getInstance()->getUser()->isAuthenticated()) sfContext::getInstance()->getUser()->signOut();
	}
	private function logUserIn($id) {

		$this->logUserOut();

		$userObj = Doctrine_Core::getTable('SfGuardUser')->findOneById($id);
		sfContext::getInstance()->getUser()->signin($userObj, false);

		return sfContext::getInstance()->getUser();
	}

	private function dbg_testAPIConnection() {

		print_r(sfContext::getInstance()->getUser()->getMelody('eventbrite')->getUserData(null));
	}
}
