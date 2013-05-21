<?php

/**
 * Event form base class.
 *
 * @method Event getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'eventbrite_id'       => new sfWidgetFormInputText(),
      'venue_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'), 'add_empty' => false)),
      'organiser_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'), 'add_empty' => false)),
      'title'               => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea(),
      'start_date'          => new sfWidgetFormDateTime(),
      'end_date'            => new sfWidgetFormDateTime(),
      'timezone'            => new sfWidgetFormInputText(),
      'url'                 => new sfWidgetFormInputText(),
      'capacity'            => new sfWidgetFormInputText(),
      'created'             => new sfWidgetFormDateTime(),
      'eventbrite_modified' => new sfWidgetFormDateTime(),
      'privacy'             => new sfWidgetFormInputText(),
      'password'            => new sfWidgetFormInputText(),
      'logo'                => new sfWidgetFormInputText(),
      'logo_ssl'            => new sfWidgetFormInputText(),
      'status'              => new sfWidgetFormInputText(),
      'tickets_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Ticket')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eventbrite_id'       => new sfValidatorInteger(array('required' => false)),
      'venue_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'))),
      'organiser_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'))),
      'title'               => new sfValidatorString(array('max_length' => 64)),
      'description'         => new sfValidatorString(array('max_length' => 512)),
      'start_date'          => new sfValidatorDateTime(array('required' => false)),
      'end_date'            => new sfValidatorDateTime(array('required' => false)),
      'timezone'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'url'                 => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'capacity'            => new sfValidatorInteger(array('required' => false)),
      'created'             => new sfValidatorDateTime(array('required' => false)),
      'eventbrite_modified' => new sfValidatorDateTime(array('required' => false)),
      'privacy'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'password'            => new sfValidatorString(array('max_length' => 160, 'required' => false)),
      'logo'                => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'logo_ssl'            => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'status'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'tickets_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Ticket', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
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
