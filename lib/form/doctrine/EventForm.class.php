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

		$this->useFields(array(

			'title',
			'description',
			'start_hour',		// TODO: dates to be calculated upon submission
			'end_hour',
			'listing_color',

			'category_id',
			'venue_id',
			'organiser_id',		// TODO: think of it
			//'tickets_list'
		));

		$this->setWidget('logo', new sfWidgetFormInputFile());
		$this->setValidator('logo', new sfValidatorFile(array(

			'mime_types'	=> 'web_images',
			'path'		=> sfConfig::get('sf_upload"dir') . '/logos',	// TODO: create this dir
			'required'	=> false
		)));

		// embedded forms: http://symfony.com/legacy/doc/more-with-symfony/1_4/en/06-Advanced-Forms
		// http://www.thatsquality.com/articles/stretching-sfform-with-dynamic-elements-ajax-a-love-story
		$this->embedForm('newVenue', new VenueCollectionForm(null, array(

			'event'	=> $this->getObject(),
			'size'	=> 1
		)));

		$this->embedRelation('Tickets');
	}

	public function saveEmbeddedForms($con = null, $forms = null) {

		if(null === $forms) {

			$venues = $this->getValue('newVenue');
			$forms = $this->embeddedForms;
			foreach($this->embeddedForms['newVenue'] as $name => $form) {

				if(!isset($venues[$name])) unset($forms['newVenue'][$name]);
			}
		}

		return parent::saveEmbeddedForms($con, $forms);
	}
}
