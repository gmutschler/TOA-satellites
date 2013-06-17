<?php

/**
 * AttendeeTicket filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAttendeeTicketFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'attendee_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Attendee'), 'add_empty' => true)),
      'ticket_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ticket'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'attendee_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Attendee'), 'column' => 'id')),
      'ticket_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ticket'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('attendee_ticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AttendeeTicket';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'attendee_id' => 'ForeignKey',
      'ticket_id'   => 'ForeignKey',
    );
  }
}
