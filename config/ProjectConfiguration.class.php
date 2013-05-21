<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony-1.4.20/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    //$this->enablePlugins('sfDoctrinePlugin');
    $this->enableAllPluginsExcept(array('sfPropelPlugin'));
  }

/*
  static protected $eventBriteLoaded = false;
  static public function registerEventBrite() {

	if(self::$eventBriteLoaded) return;

	set_include_path(sfConfig::get('sf_lib_dir') . '/vendor' . PATH_SEPARATOR . get_include_path());
	require_once sfConfig::get('sf_lib_dir') . '/vendor/Eventbrite.php';
  }
*/
}
