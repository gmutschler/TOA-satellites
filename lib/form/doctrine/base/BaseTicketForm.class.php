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
      'id'                => new sfWidgetFormInputHidden(),
      'event_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => false)),
      'name'              => new sfWidgetFormInputText(),
      'description'       => new sfWidgetFormTextarea(),
      'price'             => new sfWidgetFormInputText(),
      'end_date'          => new sfWidgetFormDateTime(),
      'quantity_declared' => new sfWidgetFormInputText(),
      'quantity_paid'     => new sfWidgetFormInputText(),
      'quantity_free'     => new sfWidgetFormInputText(),
      'eventbrite_id'     => new sfWidgetFormInputText(),
      'evenbrite_id_free' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'event_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Event'))),
      'name'              => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'description'       => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'price'             => new sfValidatorNumber(array('required' => false)),
      'end_date'          => new sfValidatorDateTime(array('required' => false)),
      'quantity_declared' => new sfValidatorInteger(),
      'quantity_paid'     => new sfValidatorInteger(array('required' => false)),
      'quantity_free'     => new sfValidatorInteger(array('required' => false)),
      'eventbrite_id'     => new sfValidatorInteger(array('required' => false)),
      'evenbrite_id_free' => new sfValidatorInteger(array('required' => false)),
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
