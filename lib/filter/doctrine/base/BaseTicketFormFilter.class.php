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
      'eventbrite_id'      => new sfWidgetFormFilterInput(),
      'type'               => new sfWidgetFormFilterInput(),
      'currency'           => new sfWidgetFormFilterInput(),
      'price'              => new sfWidgetFormFilterInput(),
      'max'                => new sfWidgetFormFilterInput(),
      'min'                => new sfWidgetFormFilterInput(),
      'start_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'quantity_available' => new sfWidgetFormFilterInput(),
      'quantity_sold'      => new sfWidgetFormFilterInput(),
      'visible'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'events_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Event')),
    ));

    $this->setValidators(array(
      'eventbrite_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'currency'           => new sfValidatorPass(array('required' => false)),
      'price'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'max'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'min'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'start_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'quantity_available' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity_sold'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visible'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'events_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Event', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addEventsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.EventTicket EventTicket')
      ->andWhereIn('EventTicket.event_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Ticket';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'eventbrite_id'      => 'Number',
      'type'               => 'Number',
      'currency'           => 'Text',
      'price'              => 'Number',
      'max'                => 'Number',
      'min'                => 'Number',
      'start_date'         => 'Date',
      'end_date'           => 'Date',
      'quantity_available' => 'Number',
      'quantity_sold'      => 'Number',
      'visible'            => 'Boolean',
      'events_list'        => 'ManyKey',
    );
  }
}
