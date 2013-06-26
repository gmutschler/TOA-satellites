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
      'id'                   => new sfWidgetFormInputHidden(),
      'event_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Event'), 'add_empty' => false)),
      'name'                 => new sfWidgetFormInputText(),
      'description'          => new sfWidgetFormTextarea(),
      'price'                => new sfWidgetFormInputText(),
      'quantity_declared'    => new sfWidgetFormInputText(),
      'quantity_paid'        => new sfWidgetFormInputText(),
      'quantity_free'        => new sfWidgetFormInputText(),
      'sold_paid'            => new sfWidgetFormInputText(),
      'sold_free'            => new sfWidgetFormInputText(),
      'eventbrite_id'        => new sfWidgetFormInputText(),
      'eventbrite_hidden_id' => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'attendees_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Attendee')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'event_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Event'))),
      'name'                 => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'description'          => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'price'                => new sfValidatorNumber(array('required' => false)),
      'quantity_declared'    => new sfValidatorInteger(),
      'quantity_paid'        => new sfValidatorInteger(array('required' => false)),
      'quantity_free'        => new sfValidatorInteger(array('required' => false)),
      'sold_paid'            => new sfValidatorInteger(array('required' => false)),
      'sold_free'            => new sfValidatorInteger(array('required' => false)),
      'eventbrite_id'        => new sfValidatorInteger(array('required' => false)),
      'eventbrite_hidden_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'attendees_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Attendee', 'required' => false)),
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

    if (isset($this->widgetSchema['attendees_list']))
    {
      $this->setDefault('attendees_list', $this->object->Attendees->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAttendeesList($con);

    parent::doSave($con);
  }

  public function saveAttendeesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['attendees_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Attendees->getPrimaryKeys();
    $values = $this->getValue('attendees_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Attendees', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Attendees', array_values($link));
    }
  }

}
