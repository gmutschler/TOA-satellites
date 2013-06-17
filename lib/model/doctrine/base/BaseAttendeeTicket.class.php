<?php

/**
 * BaseAttendeeTicket
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $attendee_id
 * @property integer $ticket_id
 * @property Ticket $Ticket
 * @property Attendee $Attendee
 * 
 * @method integer        getAttendeeId()  Returns the current record's "attendee_id" value
 * @method integer        getTicketId()    Returns the current record's "ticket_id" value
 * @method Ticket         getTicket()      Returns the current record's "Ticket" value
 * @method Attendee       getAttendee()    Returns the current record's "Attendee" value
 * @method AttendeeTicket setAttendeeId()  Sets the current record's "attendee_id" value
 * @method AttendeeTicket setTicketId()    Sets the current record's "ticket_id" value
 * @method AttendeeTicket setTicket()      Sets the current record's "Ticket" value
 * @method AttendeeTicket setAttendee()    Sets the current record's "Attendee" value
 * 
 * @package    toaberlin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAttendeeTicket extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('attendee_ticket');
        $this->hasColumn('attendee_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('ticket_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));

        $this->option('charset', 'UTF8');
        $this->option('type', 'innodb');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Ticket', array(
             'local' => 'ticket_id',
             'foreign' => 'id'));

        $this->hasOne('Attendee', array(
             'local' => 'attendee_id',
             'foreign' => 'id'));
    }
}