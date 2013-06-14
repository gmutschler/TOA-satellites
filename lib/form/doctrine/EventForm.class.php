<?php

/**
 * Event form.
 *
 * @package    toaberlin
 * @subpackage form
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EventForm extends BaseEventForm {

	public function configure() {

		// important fields
		$this->useFields(array(

			'title',
			'description',
			'start_hour',		// TODO: check why the fuck it don't get saved; dates to be calculated upon submission
			'end_hour',
			'listing_color',

			'venue_name',
			'venue_address',
			'venue_city',
			'venue_postal_code',

			'category_id',
			'organiser_id'		// TODO: auto-set it!
		));

		// widgets and validators
		$this->setWidget('logo', new sfWidgetFormInputFile());
		$this->setValidator('logo', new sfValidatorFile(array(

			'mime_types'	=> 'web_images',
			'path'		=> sfConfig::get('sf_upload_dir') . '/logos',	// TODO: create this dir
			'required'	=> false
		)));

		// TODO: add validators for start/end hours!

		// embedded forms: http://symfony.com/legacy/doc/more-with-symfony/1_4/en/06-Advanced-Forms
		// http://www.thatsquality.com/articles/stretching-sfform-with-dynamic-elements-ajax-a-love-story
		$this->embedForm('newTickets', new TicketCollectionForm(null, array(

			'event'	=> $this->getObject(),
			'size'	=> 1
		)));

		$this->embedRelation('Tickets');
	}

	public function saveEmbeddedForms($con = null, $forms = null) {

		// unset nulls in embedded tickets form
		if(null === $forms) {

			$tickets = $this->getValue('newTickets');
			$forms = $this->embeddedForms;
			foreach($this->embeddedForms['newTickets'] as $name => $form) {

				if(!isset($tickets[$name])) unset($forms['newTickets'][$name]);
			}
		}

		return parent::saveEmbeddedForms($con, $forms);
	}
}
