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
      'event_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => true)),
      'type'               => new sfWidgetFormFilterInput(),
      'price'              => new sfWidgetFormFilterInput(),
      'max'                => new sfWidgetFormFilterInput(),
      'min'                => new sfWidgetFormFilterInput(),
      'start_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'quantity_available' => new sfWidgetFormFilterInput(),
      'quantity_sold'      => new sfWidgetFormFilterInput(),
      'visible'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'eventbrite_id'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'event_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Event'), 'column' => 'id')),
      'type'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'max'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'min'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'start_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'quantity_available' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity_sold'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visible'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'eventbrite_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('ticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ticket';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'event_id'           => 'ForeignKey',
      'type'               => 'Number',
      'price'              => 'Number',
      'max'                => 'Number',
      'min'                => 'Number',
      'start_date'         => 'Date',
      'end_date'           => 'Date',
      'quantity_available' => 'Number',
      'quantity_sold'      => 'Number',
      'visible'            => 'Boolean',
      'eventbrite_id'      => 'Number',
    );
  }
}
