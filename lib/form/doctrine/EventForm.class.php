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
			'paypal',

			'venue_name',
			'venue_address',
			'venue_city',
			'venue_postal_code',
			'venue_latitude',
			'venue_longitude',

			'category_id'
		));

		// widgets and validators
		$this->setWidget('logo', new sfWidgetFormInputFileEditable(array(

			'file_src'	=> '/uploads/event_images/' . $this->getObject()->logo,
			'edit_mode'	=> !$this->isNew(),
			'is_image'	=> true,
			'with_delete'	=> false
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
		$this->setValidator('venue_postal_code', new sfValidatorRegex(

			array(
				'required' => true,
				'pattern' => '/^1([0-9]){4}$/'		// '15665' format

			),
			array(
				'invalid' => 'Zip code must be defined in 1XXXX format!'
			)
		));
		$this->setWidget('venue_city', new sfWidgetFormInput(

			array('label' => 'City'),
			array('placeholder' => 'City')
		));
		$this->setWidget('venue_latitude', new sfWidgetFormInputHidden());
		$this->setWidget('venue_longitude', new sfWidgetFormInputHidden());
		//$this->getWidget('venue_latitude')->setDefault('test value');		// ** default values would be handled with JavaScript 
		$this->setWidget('paypal', new sfWidgetFormInput(

			array('label' => 'Paypal address'),
			array('placeholder' => 'Paypal e-mail address')
		));
		$this->setValidator('paypal', new sfValidatorEmail(

			array('required' => false),
			array('invalid' => 'The e-mail address is improperly formatted')
		));

		// validators for other widgets
		$this->setValidator('start_hour', new sfValidatorTime());
		$this->setValidator('end_hour', new sfValidatorTime());

		// global validators
		$this->validatorSchema->setPostValidator(new sfValidatorAnd(array(

			// make sure the time_start and time_end are proper
			new sfValidatorSchemaCompare('start_hour', sfValidatorSchemaCompare::LESS_THAN, 'end_hour',

				array('throw_global_error' => true),
				array('invalid' => 'The start hour ("%left_field%") must be before the end hour ("%right_field%")')
			),

			// require 'paypal' email only when there is a price set on the ticket
			new sfValidatorCallback(array('callback' => array($this, 'checkPaypal')))
		)));

		// # Embedded forms: http://symfony.com/legacy/doc/more-with-symfony/1_4/en/06-Advanced-Forms
		// http://www.thatsquality.com/articles/stretching-sfform-with-dynamic-elements-ajax-a-love-story
		$this->embedForm('newTickets', new TicketCollectionForm(null, array(

			'event'	=> $this->getObject(),
			'size'	=> 1
		)));
		$this->embedRelation('Tickets');
	}

	// paypal validator here
	public function checkPaypal($validator, $values) {

		// proceed only if we have either old or new tickets
		if($values['Tickets'] or $values['newTickets']) {

			// make sure we got some real world values here :)
			if(is_array($values['Tickets']) and is_array($values['newTickets'])) $allTickets = array_merge($values['Tickets'], $values['newTickets']);
			else if(is_array($values['Tickets'])) $allTickets = $values['Tickets'];
			else if(is_array($values['newTickets'])) $allTickets = $values['newTickets'];
			else $allTickets = array();

			// proceed only if we really got something to test
			if(!count($allTickets)) return $values;

			// iterate through all possibilities and search for non-zero price
			$needEmail = false;
			foreach($allTickets as $ticket) {

				if(isset($ticket['price']) and $ticket['price'] != 0) $needEmail = true;
			}

			// RETURN if we don't need email
			if(!$needEmail) return $values;

			// analyse if we can proceed
			else {

				// LATER: best if we could fetch the paypal validator messages or inject it's 'required' flag here
				if(empty($values['paypal'])) {

					throw new sfValidatorErrorSchema($validator, array(
					
						'paypal' => new sfValidatorError($validator, 'Paypal e-mail address is required when you have paid tickets!')
					));
				}

				else return $values;	// ** let's hope the main validator can pass it
			}
		}
		return $values;
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

		// LATER: For SWFUpload use $ret = parent::doSave($con); at top, process the form and return $ret at the end

		// override stupid times in DATETIME format
		if($this->getValue('start_hour') and $this->getValue('end_hour')) {

			$startDate = sfConfig::get('app_satellites_date') . ' ' . $this->getValue('start_hour');
			$endDate = sfConfig::get('app_satellites_date') . ' ' . $this->getValue('end_hour');

			$this->getObject()->setStartDate($startDate);
			$this->getObject()->setEndDate($endDate);
		}

		// override organizer by attaching it to currently logged on user
		if($organiser = sfContext::getInstance()->getUser()->getGuardUser()->getOrganiser()) $this->getObject()->setOrganiser($organiser);

		return parent::doSave($con);
	}
}
