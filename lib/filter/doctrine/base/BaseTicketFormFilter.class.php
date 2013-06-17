<?php

/**
 * Ticket filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTicketFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'event_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => true)),
      'name'              => new sfWidgetFormFilterInput(),
      'description'       => new sfWidgetFormFilterInput(),
      'price'             => new sfWidgetFormFilterInput(),
      'end_date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'quantity_declared' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'quantity_paid'     => new sfWidgetFormFilterInput(),
      'quantity_free'     => new sfWidgetFormFilterInput(),
      'eventbrite_id'     => new sfWidgetFormFilterInput(),
      'evenbrite_id_free' => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'attendees_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Attendee')),
    ));

    $this->setValidators(array(
      'event_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Event'), 'column' => 'id')),
      'name'              => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'price'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'end_date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'quantity_declared' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity_paid'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity_free'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'eventbrite_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'evenbrite_id_free' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'attendees_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Attendee', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAttendeesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.AttendeeTicket AttendeeTicket')
      ->andWhereIn('AttendeeTicket.attendee_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Ticket';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'event_id'          => 'ForeignKey',
      'name'              => 'Text',
      'description'       => 'Text',
      'price'             => 'Number',
      'end_date'          => 'Date',
      'quantity_declared' => 'Number',
      'quantity_paid'     => 'Number',
      'quantity_free'     => 'Number',
      'eventbrite_id'     => 'Number',
      'evenbrite_id_free' => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'attendees_list'    => 'ManyKey',
    );
  }
}
