<?php

/**
 * api actions.
 *
 * @package    toaberlin
 * @subpackage api
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apiActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {

		$this->forward('default', 'module');
	}

	public function executeFetchAllSatellites() {

		// TODO: remove the hardcoded URLs here, replace them with sth dynamic
		$urlPrefix = 'http://toaberlin.com/';

		// fetch all
		$events = Doctrine_Core::getTable('Event')->getSynchronized();

		// format
		$response = array();
		foreach($events as $event) {

			// prepare single event fields needed by API specs
			$e = array(

				'title'		=> $event->getTitle(),
				'description'	=> $event->getDescription(),
				'url'		=> $urlPrefix . 'satellites/event/id/' . $event->getId(),
				'start_date'	=> $event->getStartDate(),
				'end_date'	=> $event->getEndDate(),
				'venue'		=> array(

					'name'		=> $event->getVenueName(),
					'address'	=> $event->getVenueAddress(),
					'postal_code'	=> $event->getVenuePostalCode(),
					'city'		=> $event->getVenueCity()
				),
				'category'	=> $event->getCategory()->getName(),
				'logo'		=> $event->getLogo() ? $urlPrefix . 'uploads/event_images/' . $event->getLogo() : null,
				'eventbrite_id'	=> $event->getEventbriteId(),
				'organiser'	=> array(

					'name'		=> $event->getOrganiser()->getName(),
					'description'	=> $event->getOrganiser()->getDescription(),
					'logo'		=> $event->getOrganiser()->getLogo() ? $urlPrefix . 'uploads/organiser_images/' . $event->getOrganiser()->getLogo() : null,
					'url'		=> $event->getOrganiser()->getUrl() ? $event->getOrganiser()->getHttpPrefixed($event->getOrganiser()->getUrl()) : null,
					'facebook'	=> $event->getOrganiser()->getFacebook() ? $event->getOrganiser()->getHttpPrefixed($event->getOrganiser()->getFacebook()) : null,
					'twitter'	=> $event->getOrganiser()->getTwitter() ? $event->getOrganiser()->getHttpPrefixed($event->getOrganiser()->getTwitter()) : null
				)
			);

			// push them to global response array
			$response[] = $e;
		}

		// respond
		$this->getResponse()->setContentType('text/plain');
		return $this->renderText(print_r($response, true));

		/*
		$this->getResponse()->setContentType('application/json');
		return $this->renderText(json_encode($response));
		*/
	}
}
