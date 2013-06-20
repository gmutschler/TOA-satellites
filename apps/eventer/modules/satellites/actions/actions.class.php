<?php

/**
 * satellites actions.
 *
 * @package    toaberlin
 * @subpackage satellites
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class satellitesActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {
	}

	public function executeBook(sfWebRequest $request) {

		$this->events = Doctrine_Core::getTable('Event')->getEventsForPage($request->getParameter('page'));
	}

	public function executeEvent(sfWebRequest $request) {

		$this->event = Doctrine_Core::getTable('Event')->findOneById($request->getParameter('id'));
		$this->forward404Unless($this->event);
	}

	public function executeHost(sfWebRequest $request) {

		// user not logged in? set callback action and redirect him to login
		if(!$this->getUser()->isAuthenticated()) {

			$this->getUser()->setAttribute('loginCallback', 'satellites/host');
			$this->forward('home', 'login');
		}

		// check if we should host a new event for the user, or allow him to select from Eventbrite ones already
		if($events = EventTable::getInstance()->getAPIUnhostedForUser($this->getUser())) {

			// prepare variable for the layout
			// ** ugly hack: strip tags rightaway...
			foreach($events as $key => $event) $events[$key]['event']['description'] = trim(strip_tags($event['event']['description']));
			$this->eventsArray = $events;
		}

		// Create the new form for all cases
		$this->form = new EventForm();
	}
	public function executeImport(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) {

			$this->getUser()->setAttribute('loginCallback', 'satellites/host');
			$this->forward('home', 'login');
		}
		$this->forward404Unless($request->getParameter('id'));

		// TODO: the import actions in model...
		// TODO: we shall also take care of $request->getParameter('category') somehow
		die(print('We shall now import an event with the id #' . $request->getParameter('id')));
	}

	public function executeCreate(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new EventForm();
		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}
	public function executeEdit(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');
		$this->forward404Unless($event = Doctrine_Core::getTable('Event')->find(array($request->getParameter('id'))), sprintf('Object event does not exist (%s).', $request->getParameter('id')));

		// TODO: make sure the event belongs to the user

		$this->form = new EventForm($event);
	}
	// TODO: make sure the event belongs to the userwork on below actions
	public function executeUpdate(sfWebRequest $request) {

		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($event = Doctrine_Core::getTable('Event')->find(array($request->getParameter('id'))), sprintf('Object event does not exist (%s).', $request->getParameter('id')));
		$this->form = new EventForm($event);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {

		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

		if($form->isValid()) {

			// prepare stuff for thumbnails
			// TODO: rethink
			$file = $this->form->getValue('logo');
			$extension = $file->getExtension($file->getOriginalExtension());
			$dir = sfConfig::get('sf_upload_dir') . '/event_images/';

			$event = $form->save();

			// thumbnails
			if($event->getLogo()) {

				$thumb = new sfThumbnail(174, 126, false, true, 100, 'sfImageMagickAdapter', array('method' => 'shave_all'), true, 'center', 'middle');
				$thumb->loadFile($dir . $event->getLogo());
				$thumb->save($dir . $event->getLogo());
			}

			// message
			$this->getUser()->setFlash('info', 'Your event has been saved!');

			// redir
			$this->redirect('satellites/edit?id='.$event->getId());
		}
	}


  // TODO: deprecate this totally
  public function executeDelete(sfWebRequest $request) {
    $request->checkCSRFProtection();

    $this->forward404Unless($event = Doctrine_Core::getTable('Event')->find(array($request->getParameter('id'))), sprintf('Object event does not exist (%s).', $request->getParameter('id')));
    $event->delete();

    $this->redirect('satellites/index');
  }
}
