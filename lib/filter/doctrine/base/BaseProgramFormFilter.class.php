<?php

/**
 * Program filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProgramFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kind'            => new sfWidgetFormFilterInput(),
      'title'           => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'start_hour'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'end_hour'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo'           => new sfWidgetFormFilterInput(),
      'url'             => new sfWidgetFormFilterInput(),
      'facebook'        => new sfWidgetFormFilterInput(),
      'twitter'         => new sfWidgetFormFilterInput(),
      'room'            => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'speakers_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Speaker')),
      'moderators_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Speaker')),
    ));

    $this->setValidators(array(
      'kind'            => new sfValidatorPass(array('required' => false)),
      'title'           => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'start_hour'      => new sfValidatorPass(array('required' => false)),
      'end_hour'        => new sfValidatorPass(array('required' => false)),
      'photo'           => new sfValidatorPass(array('required' => false)),
      'url'             => new sfValidatorPass(array('required' => false)),
      'facebook'        => new sfValidatorPass(array('required' => false)),
      'twitter'         => new sfValidatorPass(array('required' => false)),
      'room'            => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'speakers_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Speaker', 'required' => false)),
      'moderators_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Speaker', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('program_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSpeakersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProgramSpeaker ProgramSpeaker')
      ->andWhereIn('ProgramSpeaker.speaker_id', $values)
    ;
  }

  public function addModeratorsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProgramModerator ProgramModerator')
      ->andWhereIn('ProgramModerator.speaker_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Program';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'kind'            => 'Text',
      'title'           => 'Text',
      'description'     => 'Text',
      'start_hour'      => 'Text',
      'end_hour'        => 'Text',
      'photo'           => 'Text',
      'url'             => 'Text',
      'facebook'        => 'Text',
      'twitter'         => 'Text',
      'room'            => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'speakers_list'   => 'ManyKey',
      'moderators_list' => 'ManyKey',
    );
  }
}
