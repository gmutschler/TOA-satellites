<?php

/**
 * BaseUserTicket
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $ticket_id
 * 
 * @method integer    getUserId()    Returns the current record's "user_id" value
 * @method integer    getTicketId()  Returns the current record's "ticket_id" value
 * @method UserTicket setUserId()    Sets the current record's "user_id" value
 * @method UserTicket setTicketId()  Sets the current record's "ticket_id" value
 * 
 * @package    toaberlin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserTicket extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_ticket');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('ticket_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));


        $this->index('double_key_index', array(
             'fields' => 
             array(
              0 => 'ticket_id',
              1 => 'user_id',
             ),
             'type' => 'unique',
             ));
        $this->option('charset', 'UTF8');
        $this->option('type', 'innodb');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}