<?php

/**
 * Event filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEventFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'eventbrite_id'       => new sfWidgetFormFilterInput(),
      'venue_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'), 'add_empty' => true)),
      'organiser_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'), 'add_empty' => true)),
      'title'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'start_date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'timezone'            => new sfWidgetFormFilterInput(),
      'url'                 => new sfWidgetFormFilterInput(),
      'capacity'            => new sfWidgetFormFilterInput(),
      'created'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'eventbrite_modified' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'privacy'             => new sfWidgetFormFilterInput(),
      'password'            => new sfWidgetFormFilterInput(),
      'logo'                => new sfWidgetFormFilterInput(),
      'logo_ssl'            => new sfWidgetFormFilterInput(),
      'status'              => new sfWidgetFormFilterInput(),
      'moderated'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'listing_color'       => new sfWidgetFormFilterInput(),
      'tickets_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Ticket')),
    ));

    $this->setValidators(array(
      'category_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'eventbrite_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'venue_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Venue'), 'column' => 'id')),
      'organiser_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organiser'), 'column' => 'id')),
      'title'               => new sfValidatorPass(array('required' => false)),
      'description'         => new sfValidatorPass(array('required' => false)),
      'start_date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'timezone'            => new sfValidatorPass(array('required' => false)),
      'url'                 => new sfValidatorPass(array('required' => false)),
      'capacity'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'eventbrite_modified' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'privacy'             => new sfValidatorPass(array('required' => false)),
      'password'            => new sfValidatorPass(array('required' => false)),
      'logo'                => new sfValidatorPass(array('required' => false)),
      'logo_ssl'            => new sfValidatorPass(array('required' => false)),
      'status'              => new sfValidatorPass(array('required' => false)),
      'moderated'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'listing_color'       => new sfValidatorPass(array('required' => false)),
      'tickets_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Ticket', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addTicketsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('EventTicket.ticket_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Event';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'category_id'         => 'ForeignKey',
      'eventbrite_id'       => 'Number',
      'venue_id'            => 'ForeignKey',
      'organiser_id'        => 'ForeignKey',
      'title'               => 'Text',
      'description'         => 'Text',
      'start_date'          => 'Date',
      'end_date'            => 'Date',
      'timezone'            => 'Text',
      'url'                 => 'Text',
      'capacity'            => 'Number',
      'created'             => 'Date',
      'eventbrite_modified' => 'Date',
      'privacy'             => 'Text',
      'password'            => 'Text',
      'logo'                => 'Text',
      'logo_ssl'            => 'Text',
      'status'              => 'Text',
      'moderated'           => 'Boolean',
      'listing_color'       => 'Text',
      'tickets_list'        => 'ManyKey',
    );
  }
}
