<?php

/**
 * Venue form base class.
 *
 * @method Venue getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVenueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'address'       => new sfWidgetFormInputText(),
      'city'          => new sfWidgetFormInputText(),
      'postal_code'   => new sfWidgetFormInputText(),
      'longitude'     => new sfWidgetFormInputText(),
      'latitude'      => new sfWidgetFormInputText(),
      'eventbrite_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'address'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'city'          => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'postal_code'   => new sfValidatorInteger(array('required' => false)),
      'longitude'     => new sfValidatorNumber(array('required' => false)),
      'latitude'      => new sfValidatorNumber(array('required' => false)),
      'eventbrite_id' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('venue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Venue';
  }

}
