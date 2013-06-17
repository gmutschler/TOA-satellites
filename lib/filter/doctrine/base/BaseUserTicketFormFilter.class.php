<?php

/**
 * UserTicket filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserTicketFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ticket_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ticket_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('user_ticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserTicket';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'user_id'   => 'Number',
      'ticket_id' => 'Number',
    );
  }
}
