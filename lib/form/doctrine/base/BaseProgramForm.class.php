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
      'id'            => new sfWidgetFormInputHidden(),
      'kind'          => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'start_hour'    => new sfWidgetFormTime(),
      'end_hour'      => new sfWidgetFormTime(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'speakers_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Speaker')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'kind'          => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'start_hour'    => new sfValidatorTime(),
      'end_hour'      => new sfValidatorTime(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'speakers_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Speaker', 'required' => false)),
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

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['speakers_list']))
    {
      $this->setDefault('speakers_list', $this->object->Speakers->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveSpeakersList($con);

    parent::doSave($con);
  }

  public function saveSpeakersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['speakers_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Speakers->getPrimaryKeys();
    $values = $this->getValue('speakers_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Speakers', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Speakers', array_values($link));
    }
  }

}
