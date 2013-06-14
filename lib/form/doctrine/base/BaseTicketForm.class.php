<?php

/**
 * Ticket form base class.
 *
 * @method Ticket getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTicketForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'event_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => false)),
      'type'               => new sfWidgetFormInputText(),
      'price'              => new sfWidgetFormInputText(),
      'max'                => new sfWidgetFormInputText(),
      'min'                => new sfWidgetFormInputText(),
      'start_date'         => new sfWidgetFormDateTime(),
      'end_date'           => new sfWidgetFormDateTime(),
      'quantity_available' => new sfWidgetFormInputText(),
      'quantity_sold'      => new sfWidgetFormInputText(),
      'visible'            => new sfWidgetFormInputCheckbox(),
      'eventbrite_id'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'event_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Event'))),
      'type'               => new sfValidatorInteger(array('required' => false)),
      'price'              => new sfValidatorNumber(array('required' => false)),
      'max'                => new sfValidatorInteger(array('required' => false)),
      'min'                => new sfValidatorInteger(array('required' => false)),
      'start_date'         => new sfValidatorDateTime(array('required' => false)),
      'end_date'           => new sfValidatorDateTime(array('required' => false)),
      'quantity_available' => new sfValidatorInteger(array('required' => false)),
      'quantity_sold'      => new sfValidatorInteger(array('required' => false)),
      'visible'            => new sfValidatorBoolean(array('required' => false)),
      'eventbrite_id'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ticket[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ticket';
  }

}
