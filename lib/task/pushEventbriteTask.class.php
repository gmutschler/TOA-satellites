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
		if($events = Doctrine_Core::getTable('Event')->getUnsynchronized() and count($events)) foreach($events as $event) $this->pushEvent($event);
	}

	// local methods
	protected function pushEvent($event) {

		// log something
		$this->logSection('Eventbrite', sprintf('Pushing Event ID#%s "%s"...', $event->getId(), $event->getTitle()));

		// 1. log user out if any1 is logged
		if(sfContext::getInstance()->getUser()->isAuthenticated()) sfContext::getInstance()->getUser()->signOut();

		// 2. find the owner of the event and log him in
		$userObj = Doctrine_Core::getTable('SfGuardUser')->findOneById($event->getOrganiser()->getGuardUser()->getId());
		sfContext::getInstance()->getUser()->signin($userObj, false);

		// 3. send the event to API
		if($event->sendToAPIForUser(sfContext::getInstance()->getUser())) $this->logSection('Eventbrite', 'OK!');
		else $this->logSection('Eventbrite', 'FAIL!');

		// test the API connection :)
		//print_r(sfContext::getInstance()->getUser()->getMelody('eventbrite')->getUserData(null));
	}
}
