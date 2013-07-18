<?php

/**
 * Speaker filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSpeakerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'face'                    => new sfWidgetFormFilterInput(),
      'first_name'              => new sfWidgetFormFilterInput(),
      'last_name'               => new sfWidgetFormFilterInput(),
      'company_position'        => new sfWidgetFormFilterInput(),
      'company'                 => new sfWidgetFormFilterInput(),
      'description'             => new sfWidgetFormFilterInput(),
      'url'                     => new sfWidgetFormFilterInput(),
      'facebook'                => new sfWidgetFormFilterInput(),
      'twitter'                 => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'position'                => new sfWidgetFormFilterInput(),
      'programs_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Program')),
      'moderated_programs_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Program')),
    ));

    $this->setValidators(array(
      'face'                    => new sfValidatorPass(array('required' => false)),
      'first_name'              => new sfValidatorPass(array('required' => false)),
      'last_name'               => new sfValidatorPass(array('required' => false)),
      'company_position'        => new sfValidatorPass(array('required' => false)),
      'company'                 => new sfValidatorPass(array('required' => false)),
      'description'             => new sfValidatorPass(array('required' => false)),
      'url'                     => new sfValidatorPass(array('required' => false)),
      'facebook'                => new sfValidatorPass(array('required' => false)),
      'twitter'                 => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'position'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'programs_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Program', 'required' => false)),
      'moderated_programs_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Program', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('speaker_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addProgramsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ProgramSpeaker.program_id', $values)
    ;
  }

  public function addModeratedProgramsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ProgramModerator.program_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Speaker';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'face'                    => 'Text',
      'first_name'              => 'Text',
      'last_name'               => 'Text',
      'company_position'        => 'Text',
      'company'                 => 'Text',
      'description'             => 'Text',
      'url'                     => 'Text',
      'facebook'                => 'Text',
      'twitter'                 => 'Text',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'position'                => 'Number',
      'programs_list'           => 'ManyKey',
      'moderated_programs_list' => 'ManyKey',
    );
  }
}
