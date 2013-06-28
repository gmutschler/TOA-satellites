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

		$this->page = $request->getParameter('page');
		$this->category = $request->getParameter('category') ? Doctrine_Core::getTable('Category')->findOneById($request->getParameter('category')) : null;

		$this->events = Doctrine_Core::getTable('Event')->getEventsForPageAndCategory($this->page, $this->category);
		$this->categories = Doctrine_Core::getTable('Category')->findAll();

		$this->map_data_pulp = $this->makeMapDataPulp($this->events);
	}

	public function executeEvent(sfWebRequest $request) {

		$this->event = Doctrine_Core::getTable('Event')->findOneById($request->getParameter('id'));
		$this->forward404Unless($this->event);

		$this->map_data_pulp = $this->event->fetchMapDataPulpEncoded();
	}

	public function executeHost(sfWebRequest $request) {

		// user not logged in? set callback action and redirect him to login
		if(!$this->getUser()->isAuthenticated()) {

			$this->getUser()->setAttribute('loginCallback', 'satellites/host');
			$this->forward('home', 'login');
		}

		// check if we should host a new event for the user, or allow him to select from Eventbrite ones already
		/*
		if($events = EventTable::getInstance()->getAPIUnhostedForUser($this->getUser())) {

			// prepare variable for the layout
			// ** ugly hack: strip tags rightaway...
			foreach($events as $key => $event) $events[$key]['event']['description'] = trim(strip_tags($event['event']['description']));
			$this->eventsArray = $events;
		}
		*/

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

		$this->forward404Unless($event = Doctrine_Core::getTable('Event')->find(array($request->getParameter('id'))), sprintf('Object event does not exist (%s).', $request->getParameter('id')));

		if(!$this->getUser()->isAuthenticated()) {

			$this->getUser()->setAttribute('loginCallback', 'satellites/edit?id=' . $request->getParameter('id'));	// TODO: this bugs
			$this->forward('home', 'login');
		}

		// make sure the event belongs to the user
		if( !$this->getUser()->getGuardUser()->getIsSuperAdmin() and ($this->getUser()->getGuardUser() != $event->getOrganiser()->getGuardUser()) ) {

			$this->getUser()->setFlash('error', "You don't have permission to edit this event!");
			$this->redirect('satellites/book');
		}

		$this->form = new EventForm($event);
	}
	public function executeUpdate(sfWebRequest $request) {

		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($event = Doctrine_Core::getTable('Event')->find(array($request->getParameter('id'))), sprintf('Object event does not exist (%s).', $request->getParameter('id')));

		// credentials
		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');

		if( !$this->getUser()->getGuardUser()->getIsSuperAdmin() and ($this->getUser()->getGuardUser() != $event->getOrganiser()->getGuardUser()) ) {

			$this->getUser()->setFlash('error', "You don't have permission to edit this event!");
			$this->redirect('satellites/book');
		}

		$this->form = new EventForm($event);
		$this->processForm($request, $this->form);
		$this->setTemplate('edit');
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {

		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

		if($form->isValid()) {

			// save the event with all the data
			$event = $form->save();

			// unset the synchronization flag and save again! \o/
			$event->setSynchronized(false)->save();

			// rework image and thumbnail
			if($event->getLogo()) {

				// some defaults
				$dirImages = sfConfig::get('sf_upload_dir') . '/event_images/';
				$dirThumbs = $dirImages . 'thumbs/';

				// override the original with shrinked image
				$big = new sfThumbnail(582);
				$big->loadFile($dirImages . $event->getLogo());
				$big->save($dirImages . $event->getLogo());

				// make thumbnail
				$thumb = new sfThumbnail(174, 126, false, true, 100, 'sfImageMagickAdapter', array('method' => 'shave_all'), true, 'center', 'middle');
				$thumb->loadFile($dirImages . $event->getLogo());
				$thumb->save($dirThumbs . $event->getLogo());
			}

			// create (or overwrite) the map pointer and social icon images with proper color for the event
			// ** http://www.imagemagick.org/Usage/color_mods/
			if($event->getListingColor()) {

				// make sure the color starts with a hash
				$color = preg_match('/^#/', $event->getListingColor()) ? $event->getListingColor() : '#' . $event->getListingColor();

				// 1. the map pointer
				$command = sprintf('%s %s/images/layout/pin-map.png +level-colors "%s", %s',

					sfConfig::get('app_imagemagick_path'),
					sfConfig::get('sf_web_dir'),
					$color,
					sfConfig::get('sf_upload_dir') . '/event_images/pins/' . $event->getId() . '.png'
				);
				shell_exec($command . '>/dev/null');

				// 2. social icons
				foreach(array('fb-icon.png', 'twitter-icon.png', 'website-icon.png') as $icon) {

					$command = sprintf('%s %s/images/layout/%s +level-colors "%s", %s',

						sfConfig::get('app_imagemagick_path'),
						sfConfig::get('sf_web_dir'),
						$icon,
						$color,
						sfConfig::get('sf_upload_dir') . '/event_images/social_icons/' . $event->getId() . '-' . $icon
					);
					shell_exec($command . '>/dev/null');
				}
			}

			// message
			$this->getUser()->setFlash('info', 'Your event has been saved and is awaiting moderation. Thank you for your entry.');

			// redir
			$this->redirect('satellites/edit?id='.$event->getId());
		}

		else $this->getUser()->setFlash('error', 'There was a problem saving your event! Please review the fields in red');
	}

	// helper methods
	private function makeMapDataPulp(Doctrine_Collection $events) {

		if($events and count($events)) {

			$pulp = array();
			foreach($events as $event) $pulp[] = $event->fetchMapDataPulp();

			return urlencode(json_encode($pulp));
		}
		else return false;
	}
}
