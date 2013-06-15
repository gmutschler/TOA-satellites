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
      'organiser_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'), 'add_empty' => true)),
      'title'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'start_date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'start_hour'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'end_hour'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'logo'                => new sfWidgetFormFilterInput(),
      'listing_color'       => new sfWidgetFormFilterInput(),
      'moderated'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'venue_name'          => new sfWidgetFormFilterInput(),
      'venue_address'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'venue_city'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'venue_postal_code'   => new sfWidgetFormFilterInput(),
      'venue_latitude'      => new sfWidgetFormFilterInput(),
      'venue_longitude'     => new sfWidgetFormFilterInput(),
      'venue_eventbrite_id' => new sfWidgetFormFilterInput(),
      'eventbrite_id'       => new sfWidgetFormFilterInput(),
      'eventbrite_logo_url' => new sfWidgetFormFilterInput(),
      'eventbrite_created'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'eventbrite_modified' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'category_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'organiser_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organiser'), 'column' => 'id')),
      'title'               => new sfValidatorPass(array('required' => false)),
      'description'         => new sfValidatorPass(array('required' => false)),
      'start_date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'start_hour'          => new sfValidatorPass(array('required' => false)),
      'end_hour'            => new sfValidatorPass(array('required' => false)),
      'logo'                => new sfValidatorPass(array('required' => false)),
      'listing_color'       => new sfValidatorPass(array('required' => false)),
      'moderated'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'venue_name'          => new sfValidatorPass(array('required' => false)),
      'venue_address'       => new sfValidatorPass(array('required' => false)),
      'venue_city'          => new sfValidatorPass(array('required' => false)),
      'venue_postal_code'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'venue_latitude'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'venue_longitude'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'venue_eventbrite_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'eventbrite_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'eventbrite_logo_url' => new sfValidatorPass(array('required' => false)),
      'eventbrite_created'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'eventbrite_modified' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
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
      'organiser_id'        => 'ForeignKey',
      'title'               => 'Text',
      'description'         => 'Text',
      'start_date'          => 'Date',
      'end_date'            => 'Date',
      'start_hour'          => 'Text',
      'end_hour'            => 'Text',
      'logo'                => 'Text',
      'listing_color'       => 'Text',
      'moderated'           => 'Boolean',
      'venue_name'          => 'Text',
      'venue_address'       => 'Text',
      'venue_city'          => 'Text',
      'venue_postal_code'   => 'Number',
      'venue_latitude'      => 'Number',
      'venue_longitude'     => 'Number',
      'venue_eventbrite_id' => 'Number',
      'eventbrite_id'       => 'Number',
      'eventbrite_logo_url' => 'Text',
      'eventbrite_created'  => 'Date',
      'eventbrite_modified' => 'Date',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
