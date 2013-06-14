<?php

/**
 * Venue filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVenueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(),
      'address'       => new sfWidgetFormFilterInput(),
      'city'          => new sfWidgetFormFilterInput(),
      'postal_code'   => new sfWidgetFormFilterInput(),
      'longitude'     => new sfWidgetFormFilterInput(),
      'latitude'      => new sfWidgetFormFilterInput(),
      'eventbrite_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'address'       => new sfValidatorPass(array('required' => false)),
      'city'          => new sfValidatorPass(array('required' => false)),
      'postal_code'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'longitude'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'latitude'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'eventbrite_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('venue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Venue';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'address'       => 'Text',
      'city'          => 'Text',
      'postal_code'   => 'Number',
      'longitude'     => 'Number',
      'latitude'      => 'Number',
      'eventbrite_id' => 'Number',
    );
  }
}
