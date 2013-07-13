<?php

/**
 * ProgramSpeaker filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProgramSpeakerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'program_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Program'), 'add_empty' => true)),
      'speaker_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Speaker'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'program_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Program'), 'column' => 'id')),
      'speaker_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Speaker'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('program_speaker_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProgramSpeaker';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'program_id' => 'ForeignKey',
      'speaker_id' => 'ForeignKey',
    );
  }
}
