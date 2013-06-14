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
      'category_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'venue_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'), 'add_empty' => false)),
      'organiser_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'), 'add_empty' => false)),
      'title'               => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea(),
      'start_date'          => new sfWidgetFormDateTime(),
      'end_date'            => new sfWidgetFormDateTime(),
      'start_hour'          => new sfWidgetFormTime(),
      'end_hour'            => new sfWidgetFormTime(),
      'logo'                => new sfWidgetFormInputText(),
      'listing_color'       => new sfWidgetFormInputText(),
      'moderated'           => new sfWidgetFormInputCheckbox(),
      'eventbrite_created'  => new sfWidgetFormDateTime(),
      'eventbrite_modified' => new sfWidgetFormDateTime(),
      'eventbrite_logo_url' => new sfWidgetFormInputText(),
      'eventbrite_id'       => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'venue_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'))),
      'organiser_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organiser'))),
      'title'               => new sfValidatorString(array('max_length' => 64)),
      'description'         => new sfValidatorString(array('max_length' => 512)),
      'start_date'          => new sfValidatorDateTime(array('required' => false)),
      'end_date'            => new sfValidatorDateTime(array('required' => false)),
      'start_hour'          => new sfValidatorTime(array('required' => false)),
      'end_hour'            => new sfValidatorTime(array('required' => false)),
      'logo'                => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'listing_color'       => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'moderated'           => new sfValidatorBoolean(array('required' => false)),
      'eventbrite_created'  => new sfValidatorDateTime(array('required' => false)),
      'eventbrite_modified' => new sfValidatorDateTime(array('required' => false)),
      'eventbrite_logo_url' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'eventbrite_id'       => new sfValidatorInteger(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
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

}
