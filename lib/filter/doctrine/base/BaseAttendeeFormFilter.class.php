<?php

/**
 * Attendee filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAttendeeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GuardUser'), 'add_empty' => true)),
      'has_main_ticket' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tickets_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Ticket')),
    ));

    $this->setValidators(array(
      'user_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GuardUser'), 'column' => 'id')),
      'has_main_ticket' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tickets_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Ticket', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('attendee_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addTicketsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AttendeeTicket AttendeeTicket')
      ->andWhereIn('AttendeeTicket.ticket_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Attendee';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'user_id'         => 'ForeignKey',
      'has_main_ticket' => 'Boolean',
      'tickets_list'    => 'ManyKey',
    );
  }
}
