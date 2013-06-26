<?php

/**
 * Event form base class.
 *
 * @method Event getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'category_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'organiser_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'), 'add_empty' => false)),
      'title'                    => new sfWidgetFormInputText(),
      'description'              => new sfWidgetFormInputText(),
      'paypal'                   => new sfWidgetFormInputText(),
      'start_date'               => new sfWidgetFormDateTime(),
      'end_date'                 => new sfWidgetFormDateTime(),
      'start_hour'               => new sfWidgetFormTime(),
      'end_hour'                 => new sfWidgetFormTime(),
      'logo'                     => new sfWidgetFormInputText(),
      'listing_color'            => new sfWidgetFormInputText(),
      'test'                     => new sfWidgetFormInputCheckbox(),
      'moderated'                => new sfWidgetFormInputCheckbox(),
      'synchronized'             => new sfWidgetFormInputCheckbox(),
      'venue_name'               => new sfWidgetFormInputText(),
      'venue_address'            => new sfWidgetFormInputText(),
      'venue_city'               => new sfWidgetFormInputText(),
      'venue_postal_code'        => new sfWidgetFormInputText(),
      'venue_latitude'           => new sfWidgetFormInputText(),
      'venue_longitude'          => new sfWidgetFormInputText(),
      'venue_eventbrite_id'      => new sfWidgetFormInputText(),
      'eventbrite_logo_url'      => new sfWidgetFormInputText(),
      'eventbrite_accesscode'    => new sfWidgetFormInputText(),
      'eventbrite_accesscode_id' => new sfWidgetFormInputText(),
      'eventbrite_id'            => new sfWidgetFormInputText(),
      'eventbrite_payment_id'    => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'organiser_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'))),
      'title'                    => new sfValidatorString(array('max_length' => 64)),
      'description'              => new sfValidatorPass(),
      'paypal'                   => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'start_date'               => new sfValidatorDateTime(array('required' => false)),
      'end_date'                 => new sfValidatorDateTime(array('required' => false)),
      'start_hour'               => new sfValidatorTime(),
      'end_hour'                 => new sfValidatorTime(),
      'logo'                     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'listing_color'            => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'test'                     => new sfValidatorBoolean(array('required' => false)),
      'moderated'                => new sfValidatorBoolean(array('required' => false)),
      'synchronized'             => new sfValidatorBoolean(array('required' => false)),
      'venue_name'               => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'venue_address'            => new sfValidatorString(array('max_length' => 128)),
      'venue_city'               => new sfValidatorString(array('max_length' => 32)),
      'venue_postal_code'        => new sfValidatorInteger(array('required' => false)),
      'venue_latitude'           => new sfValidatorNumber(array('required' => false)),
      'venue_longitude'          => new sfValidatorNumber(array('required' => false)),
      'venue_eventbrite_id'      => new sfValidatorInteger(array('required' => false)),
      'eventbrite_logo_url'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'eventbrite_accesscode'    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'eventbrite_accesscode_id' => new sfValidatorInteger(array('required' => false)),
      'eventbrite_id'            => new sfValidatorInteger(array('required' => false)),
      'eventbrite_payment_id'    => new sfValidatorInteger(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
  }

}
