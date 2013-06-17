<?php

/**
 * Organiser filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrganiserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GuardUser'), 'add_empty' => true)),
      'name'          => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'logo'          => new sfWidgetFormFilterInput(),
      'url'           => new sfWidgetFormFilterInput(),
      'twitter'       => new sfWidgetFormFilterInput(),
      'facebook'      => new sfWidgetFormFilterInput(),
      'eventbrite_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GuardUser'), 'column' => 'id')),
      'name'          => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'logo'          => new sfValidatorPass(array('required' => false)),
      'url'           => new sfValidatorPass(array('required' => false)),
      'twitter'       => new sfValidatorPass(array('required' => false)),
      'facebook'      => new sfValidatorPass(array('required' => false)),
      'eventbrite_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('organiser_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organiser';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'user_id'       => 'ForeignKey',
      'name'          => 'Text',
      'description'   => 'Text',
      'logo'          => 'Text',
      'url'           => 'Text',
      'twitter'       => 'Text',
      'facebook'      => 'Text',
      'eventbrite_id' => 'Number',
    );
  }
}
