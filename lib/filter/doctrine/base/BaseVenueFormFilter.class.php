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
      'eventbrite_id' => new sfWidgetFormFilterInput(),
      'name'          => new sfWidgetFormFilterInput(),
      'address'       => new sfWidgetFormFilterInput(),
      'address2'      => new sfWidgetFormFilterInput(),
      'city'          => new sfWidgetFormFilterInput(),
      'region'        => new sfWidgetFormFilterInput(),
      'postal_code'   => new sfWidgetFormFilterInput(),
      'country'       => new sfWidgetFormFilterInput(),
      'country_code'  => new sfWidgetFormFilterInput(),
      'longitude'     => new sfWidgetFormFilterInput(),
      'latitude'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eventbrite_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'          => new sfValidatorPass(array('required' => false)),
      'address'       => new sfValidatorPass(array('required' => false)),
      'address2'      => new sfValidatorPass(array('required' => false)),
      'city'          => new sfValidatorPass(array('required' => false)),
      'region'        => new sfValidatorPass(array('required' => false)),
      'postal_code'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'country'       => new sfValidatorPass(array('required' => false)),
      'country_code'  => new sfValidatorPass(array('required' => false)),
      'longitude'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'latitude'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
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
      'eventbrite_id' => 'Number',
      'name'          => 'Text',
      'address'       => 'Text',
      'address2'      => 'Text',
      'city'          => 'Text',
      'region'        => 'Text',
      'postal_code'   => 'Number',
      'country'       => 'Text',
      'country_code'  => 'Text',
      'longitude'     => 'Number',
      'latitude'      => 'Number',
    );
  }
}
