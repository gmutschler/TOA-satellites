<?php

/**
 * Program form base class.
 *
 * @method Program getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProgramForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'first_name'  => new sfWidgetFormInputText(),
      'last_name'   => new sfWidgetFormInputText(),
      'position'    => new sfWidgetFormInputText(),
      'company'     => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'url'         => new sfWidgetFormInputText(),
      'facebook'    => new sfWidgetFormInputText(),
      'twitter'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'  => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'last_name'   => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'position'    => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'company'     => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'facebook'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'twitter'     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('program[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Program';
  }

}
