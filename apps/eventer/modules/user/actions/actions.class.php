<?php

/**
 * user actions.
 *
 * @package    toaberlin
 * @subpackage user
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) {

			$this->getUser()->setAttribute('loginCallback', 'user/index');
			$this->forward('home', 'login');
		}
		$this->user = $this->getUser()->getGuardUser();
		$this->melody = $this->getUser()->getMelody('eventbrite');

		// update user's main ticket information
		//if(!$this->user->getAttendee()->getHasMainTicket()) $this->user->getAttendee()->updateMainTicketForUser($this->getUser());

		// Form for the organisers
		$this->form = new OrganiserForm($this->user->getOrganiser());
	}

	public function executeTickets(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) {

			$this->getUser()->setAttribute('loginCallback', 'user/tickets');
			$this->forward('home', 'login');
		}
		$this->user = $this->getUser()->getGuardUser();
	}

	public function executeHostedevents(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) {

			$this->getUser()->setAttribute('loginCallback', 'user/hostedevents');
			$this->forward('home', 'login');
		}
		$this->user = $this->getUser()->getGuardUser();
		$this->events = $this->user->getOrganiser()->getEvents();
	}

	// form processing methods
	public function executeUpdate(sfWebRequest $request) {

		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($organiser = Doctrine_Core::getTable('Organiser')->find(array($request->getParameter('id'))), sprintf('Object organiser does not exist (%s).', $request->getParameter('id')));

		// TODO check if the user is actually the owner of the form?
		$this->form = new OrganiserForm($organiser);
		$this->processForm($request, $this->form);

		// set some vars for the view
		$this->user = $this->getUser()->getGuardUser();

		$this->setTemplate('index');
	}

	public function processForm(sfWebRequest $request, sfForm $form) {

		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

		if($form->isValid()) {

			$organiser = $form->save();

			// unset the synchronization flag and save again! \o/
			$organiser->setSynchronized(false)->save();

			// rework image
			if($organiser->getLogo()) {

				$dirImages = sfConfig::get('sf_upload_dir') . '/organiser_images/';

				$logo = new sfThumbnail(245);
				$logo->loadFile($dirImages . $organiser->getLogo());
				$logo->save($dirImages . $organiser->getLogo());
			}

			// message
			$this->getUser()->setFlash('info', 'Your organiser profile have been saved!');

			// redir
			$this->redirect('user/index');
		}

		else $this->getUser()->setFlash('error', 'There was a problem saving your organiser profile!');
	}
}
