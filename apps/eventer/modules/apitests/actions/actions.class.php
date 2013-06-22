<?php

/**
 * apitests actions.
 *
 * @package    toaberlin
 * @subpackage apitests
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apitestsActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {
	}

	public function executeEventget(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');
		$this->forward404unless($request->getParameter('id'));

		$this->id = $request->getParameter('id');
		$this->event = $this->getUser()->getMelody('eventbrite')->getEvent($this->id);
	}

	public function executeEventlistattendees(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');
		$this->forward404unless($request->getParameter('id'));

		$this->id = $request->getParameter('id');
		$this->attendees = $this->getUser()->getMelody('eventbrite')->getAttendees($this->id);
	}

	public function executeMe(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');
	}

	public function executeUserlistevents(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');

		$this->events = $this->getUser()->getMelody('eventbrite')->getEventsForUser($this->getUser()->getGuardUser()->getEmailAddress());
	}

	public function executeUserlisttickets(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');

		$this->tickets = $this->getUser()->getMelody('eventbrite')->getTicketsForUser($this->getUser()->getGuardUser()->getEmailAddress());
	}

	public function executeUserlistorganisers(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->forward('home', 'login');

		$this->organisers = $this->getUser()->getMelody('eventbrite')->getOrganisersForUser();
	}
}
