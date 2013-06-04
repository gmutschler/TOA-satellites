<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Events
 * 
 * @method string              getName()   Returns the current record's "name" value
 * @method Doctrine_Collection getEvents() Returns the current record's "Events" collection
 * @method Category            setName()   Sets the current record's "name" value
 * @method Category            setEvents() Sets the current record's "Events" collection
 * 
 * @package    toaberlin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('name', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));

        $this->option('charset', 'UTF8');
        $this->option('type', 'innodb');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Event as Events', array(
             'local' => 'id',
             'foreign' => 'category_id'));
    }
}