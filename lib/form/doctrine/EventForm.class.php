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
			'start_hour',
			'end_hour',
			'listing_color',

			'venue_name',
			'venue_address',
			'venue_city',
			'venue_postal_code',

			'category_id'
		));

		// widgets and validators
		$this->setWidget('logo', new sfWidgetFormInputFileEditable(array(

			'file_src'	=> '/uploads/event_images/' . $this->getObject()->logo,
			'edit_mode'	=> !$this->isNew(),
			'is_image'	=> true,
			'with_delete'	=> false	// TODO: think about it
		)));
		$this->setValidator('logo', new sfValidatorFile(array(

			'mime_types'	=> 'web_images',
			'path'		=> sfConfig::get('sf_upload_dir') . '/event_images',
			'required'	=> false
		)));
		$this->validatorSchema['logo_delete'] = new sfValidatorBoolean();

		$this->setWidget('title', new sfWidgetFormInput(

			array('label' => 'Title'),
			array('placeholder' => 'Name of your event')
		));
		$this->setWidget('description', new sfWidgetFormTextarea(

			array('label' => 'Description'),
			array('placeholder' => 'Describe your event here')
		));
		$this->setWidget('listing_color', new sfWidgetFormInput(

			array('label' => 'Color'),
			array('placeholder' => 'Your contrast color')
		));

		$this->setWidget('venue_name', new sfWidgetFormInput(

			array('label' => 'Venue name'),
			array('placeholder' => 'Name of your venue')
		));
		$this->setWidget('venue_address', new sfWidgetFormInput(

			array('label' => 'Venue address'),
			array('placeholder' => 'Address of your venue')
		));
		$this->setWidget('venue_postal_code', new sfWidgetFormInput(

			array('label' => 'Postal code'),
			array('placeholder' => 'Zip Code')
		));
		$this->setWidget('venue_city', new sfWidgetFormInput(

			array('label' => 'City'),
			array('placeholder' => 'City')
		));


		// TODO: add validators for start/end hours!
		// TODO: add validator for postal code that would remove (or add) dashes!

		// embedded forms: http://symfony.com/legacy/doc/more-with-symfony/1_4/en/06-Advanced-Forms
		// http://www.thatsquality.com/articles/stretching-sfform-with-dynamic-elements-ajax-a-love-story
		$this->embedForm('newTickets', new TicketCollectionForm(null, array(

			'event'	=> $this->getObject(),
			'size'	=> 1
		)));

		$this->embedRelation('Tickets');
	}

	// unset nulls in embedded tickets form
	public function saveEmbeddedForms($con = null, $forms = null) {

		if(null === $forms) {

			$tickets = $this->getValue('newTickets');
			$forms = $this->embeddedForms;
			foreach($this->embeddedForms['newTickets'] as $name => $form) {

				if(!isset($tickets[$name])) unset($forms['newTickets'][$name]);
			}
		}

		return parent::saveEmbeddedForms($con, $forms);
	}

	// override the saving method
	protected function doSave($con = null) {

		// INFO: For SWFUpload use $ret = parent::doSave($con); at top, process the form and return $ret at the end

		// override stupid times in DATETIME format
		if($this->getValue('start_hour') and $this->getValue('end_hour')) {

			$startDate = sfConfig::get('app_satellites_date') . ' ' . $this->getValue('start_hour');
			$endDate = sfConfig::get('app_satellites_date') . ' ' . $this->getValue('end_hour');

			$this->getObject()->setStartDate($startDate);
			$this->getObject()->setEndDate($endDate);
		}

		// TODO: play with GPS locations

		// override organizer by attaching it to currently logged on user
		if($organiser = sfContext::getInstance()->getUser()->getGuardUser()->getOrganiser()) $this->getObject()->setOrganiser($organiser);

		return parent::doSave($con);
	}
}
