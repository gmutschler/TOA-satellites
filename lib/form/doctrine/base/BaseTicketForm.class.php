<?php

/**
 * Ticket form base class.
 *
 * @method Ticket getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTicketForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'eventbrite_id'      => new sfWidgetFormInputText(),
      'type'               => new sfWidgetFormInputText(),
      'currency'           => new sfWidgetFormInputText(),
      'price'              => new sfWidgetFormInputText(),
      'max'                => new sfWidgetFormInputText(),
      'min'                => new sfWidgetFormInputText(),
      'start_date'         => new sfWidgetFormDateTime(),
      'end_date'           => new sfWidgetFormDateTime(),
      'quantity_available' => new sfWidgetFormInputText(),
      'quantity_sold'      => new sfWidgetFormInputText(),
      'visible'            => new sfWidgetFormInputCheckbox(),
      'events_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Event')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eventbrite_id'      => new sfValidatorInteger(array('required' => false)),
      'type'               => new sfValidatorInteger(array('required' => false)),
      'currency'           => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'price'              => new sfValidatorNumber(array('required' => false)),
      'max'                => new sfValidatorInteger(array('required' => false)),
      'min'                => new sfValidatorInteger(array('required' => false)),
      'start_date'         => new sfValidatorDateTime(array('required' => false)),
      'end_date'           => new sfValidatorDateTime(array('required' => false)),
      'quantity_available' => new sfValidatorInteger(array('required' => false)),
      'quantity_sold'      => new sfValidatorInteger(array('required' => false)),
      'visible'            => new sfValidatorBoolean(array('required' => false)),
      'events_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Event', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ticket[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ticket';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['events_list']))
    {
      $this->setDefault('events_list', $this->object->Events->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveEventsList($con);

    parent::doSave($con);
  }

  public function saveEventsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['events_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Events->getPrimaryKeys();
    $values = $this->getValue('events_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Events', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Events', array_values($link));
    }
  }

}
