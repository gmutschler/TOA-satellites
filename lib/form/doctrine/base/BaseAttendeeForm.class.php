<?php

/**
 * Attendee form base class.
 *
 * @method Attendee getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAttendeeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GuardUser'), 'add_empty' => false)),
      'has_main_ticket' => new sfWidgetFormInputCheckbox(),
      'tickets_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Ticket')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GuardUser'))),
      'has_main_ticket' => new sfValidatorBoolean(array('required' => false)),
      'tickets_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Ticket', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('attendee[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Attendee';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tickets_list']))
    {
      $this->setDefault('tickets_list', $this->object->Tickets->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveTicketsList($con);

    parent::doSave($con);
  }

  public function saveTicketsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tickets_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Tickets->getPrimaryKeys();
    $values = $this->getValue('tickets_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Tickets', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Tickets', array_values($link));
    }
  }

}
