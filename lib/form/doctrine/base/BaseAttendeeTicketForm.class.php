<?php

/**
 * AttendeeTicket form base class.
 *
 * @method AttendeeTicket getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAttendeeTicketForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'attendee_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Attendee'), 'add_empty' => false)),
      'ticket_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ticket'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'attendee_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Attendee'))),
      'ticket_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ticket'))),
    ));

    $this->widgetSchema->setNameFormat('attendee_ticket[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AttendeeTicket';
  }

}
