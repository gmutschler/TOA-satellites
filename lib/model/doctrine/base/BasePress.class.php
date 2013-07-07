<?php

/**
 * BasePress
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property timestamp $date
 * @property string $media
 * @property string $url
 * 
 * @method string    getTitle() Returns the current record's "title" value
 * @method timestamp getDate()  Returns the current record's "date" value
 * @method string    getMedia() Returns the current record's "media" value
 * @method string    getUrl()   Returns the current record's "url" value
 * @method Press     setTitle() Sets the current record's "title" value
 * @method Press     setDate()  Sets the current record's "date" value
 * @method Press     setMedia() Sets the current record's "media" value
 * @method Press     setUrl()   Sets the current record's "url" value
 * 
 * @package    toaberlin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePress extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('press');
        $this->hasColumn('title', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('media', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('url', 'string', 192, array(
             'type' => 'string',
             'length' => 192,
             ));

        $this->option('charset', 'UTF8');
        $this->option('type', 'innodb');
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $sortable0 = new Doctrine_Template_Sortable();
        $this->actAs($timestampable0);
        $this->actAs($sortable0);
    }
}