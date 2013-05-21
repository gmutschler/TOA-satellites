<?php

/**
 * EventTicket form base class.
 *
 * @method EventTicket getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEventTicketForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'event_id'  => new sfWidgetFormInputHidden(),
      'ticket_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'event_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('event_id')), 'empty_value' => $this->getObject()->get('event_id'), 'required' => false)),
      'ticket_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ticket_id')), 'empty_value' => $this->getObject()->get('ticket_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event_ticket[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EventTicket';
  }

}
