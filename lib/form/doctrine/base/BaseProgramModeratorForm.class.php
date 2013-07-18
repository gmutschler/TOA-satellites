<?php

/**
 * ProgramModerator form base class.
 *
 * @method ProgramModerator getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProgramModeratorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'program_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Program'), 'add_empty' => false)),
      'speaker_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Speaker'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'program_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Program'))),
      'speaker_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Speaker'))),
    ));

    $this->widgetSchema->setNameFormat('program_moderator[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProgramModerator';
  }

}
