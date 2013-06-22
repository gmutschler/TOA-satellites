<?php

/**
 * BaseEvent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $category_id
 * @property integer $organiser_id
 * @property string $title
 * @property text $description
 * @property timestamp $start_date
 * @property timestamp $end_date
 * @property time $start_hour
 * @property time $end_hour
 * @property string $logo
 * @property string $listing_color
 * @property boolean $moderated
 * @property string $venue_name
 * @property string $venue_address
 * @property string $venue_city
 * @property integer $venue_postal_code
 * @property decimal $venue_latitude
 * @property decimal $venue_longitude
 * @property integer $venue_eventbrite_id
 * @property integer $eventbrite_id
 * @property string $eventbrite_logo_url
 * @property timestamp $eventbrite_created
 * @property timestamp $eventbrite_modified
 * @property Category $Category
 * @property Organiser $Organiser
 * @property Doctrine_Collection $Tickets
 * 
 * @method integer             getCategoryId()          Returns the current record's "category_id" value
 * @method integer             getOrganiserId()         Returns the current record's "organiser_id" value
 * @method string              getTitle()               Returns the current record's "title" value
 * @method text                getDescription()         Returns the current record's "description" value
 * @method timestamp           getStartDate()           Returns the current record's "start_date" value
 * @method timestamp           getEndDate()             Returns the current record's "end_date" value
 * @method time                getStartHour()           Returns the current record's "start_hour" value
 * @method time                getEndHour()             Returns the current record's "end_hour" value
 * @method string              getLogo()                Returns the current record's "logo" value
 * @method string              getListingColor()        Returns the current record's "listing_color" value
 * @method boolean             getModerated()           Returns the current record's "moderated" value
 * @method string              getVenueName()           Returns the current record's "venue_name" value
 * @method string              getVenueAddress()        Returns the current record's "venue_address" value
 * @method string              getVenueCity()           Returns the current record's "venue_city" value
 * @method integer             getVenuePostalCode()     Returns the current record's "venue_postal_code" value
 * @method decimal             getVenueLatitude()       Returns the current record's "venue_latitude" value
 * @method decimal             getVenueLongitude()      Returns the current record's "venue_longitude" value
 * @method integer             getVenueEventbriteId()   Returns the current record's "venue_eventbrite_id" value
 * @method integer             getEventbriteId()        Returns the current record's "eventbrite_id" value
 * @method string              getEventbriteLogoUrl()   Returns the current record's "eventbrite_logo_url" value
 * @method timestamp           getEventbriteCreated()   Returns the current record's "eventbrite_created" value
 * @method timestamp           getEventbriteModified()  Returns the current record's "eventbrite_modified" value
 * @method Category            getCategory()            Returns the current record's "Category" value
 * @method Organiser           getOrganiser()           Returns the current record's "Organiser" value
 * @method Doctrine_Collection getTickets()             Returns the current record's "Tickets" collection
 * @method Event               setCategoryId()          Sets the current record's "category_id" value
 * @method Event               setOrganiserId()         Sets the current record's "organiser_id" value
 * @method Event               setTitle()               Sets the current record's "title" value
 * @method Event               setDescription()         Sets the current record's "description" value
 * @method Event               setStartDate()           Sets the current record's "start_date" value
 * @method Event               setEndDate()             Sets the current record's "end_date" value
 * @method Event               setStartHour()           Sets the current record's "start_hour" value
 * @method Event               setEndHour()             Sets the current record's "end_hour" value
 * @method Event               setLogo()                Sets the current record's "logo" value
 * @method Event               setListingColor()        Sets the current record's "listing_color" value
 * @method Event               setModerated()           Sets the current record's "moderated" value
 * @method Event               setVenueName()           Sets the current record's "venue_name" value
 * @method Event               setVenueAddress()        Sets the current record's "venue_address" value
 * @method Event               setVenueCity()           Sets the current record's "venue_city" value
 * @method Event               setVenuePostalCode()     Sets the current record's "venue_postal_code" value
 * @method Event               setVenueLatitude()       Sets the current record's "venue_latitude" value
 * @method Event               setVenueLongitude()      Sets the current record's "venue_longitude" value
 * @method Event               setVenueEventbriteId()   Sets the current record's "venue_eventbrite_id" value
 * @method Event               setEventbriteId()        Sets the current record's "eventbrite_id" value
 * @method Event               setEventbriteLogoUrl()   Sets the current record's "eventbrite_logo_url" value
 * @method Event               setEventbriteCreated()   Sets the current record's "eventbrite_created" value
 * @method Event               setEventbriteModified()  Sets the current record's "eventbrite_modified" value
 * @method Event               setCategory()            Sets the current record's "Category" value
 * @method Event               setOrganiser()           Sets the current record's "Organiser" value
 * @method Event               setTickets()             Sets the current record's "Tickets" collection
 * 
 * @package    toaberlin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEvent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('event');
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('organiser_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('title', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('description', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('start_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('end_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('start_hour', 'time', null, array(
             'type' => 'time',
             'notnull' => true,
             ));
        $this->hasColumn('end_hour', 'time', null, array(
             'type' => 'time',
             'notnull' => true,
             ));
        $this->hasColumn('logo', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('listing_color', 'string', 8, array(
             'type' => 'string',
             'length' => 8,
             ));
        $this->hasColumn('moderated', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('venue_name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('venue_address', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('venue_city', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 32,
             ));
        $this->hasColumn('venue_postal_code', 'integer', 6, array(
             'type' => 'integer',
             'length' => 6,
             ));
        $this->hasColumn('venue_latitude', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '7',
             ));
        $this->hasColumn('venue_longitude', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '7',
             ));
        $this->hasColumn('venue_eventbrite_id', 'integer', 16, array(
             'type' => 'integer',
             'length' => 16,
             ));
        $this->hasColumn('eventbrite_id', 'integer', 16, array(
             'type' => 'integer',
             'length' => 16,
             ));
        $this->hasColumn('eventbrite_logo_url', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('eventbrite_created', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('eventbrite_modified', 'timestamp', null, array(
             'type' => 'timestamp',
             ));

        $this->option('charset', 'UTF8');
        $this->option('type', 'innodb');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasOne('Organiser', array(
             'local' => 'organiser_id',
             'foreign' => 'id'));

        $this->hasMany('Ticket as Tickets', array(
             'local' => 'id',
             'foreign' => 'event_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}