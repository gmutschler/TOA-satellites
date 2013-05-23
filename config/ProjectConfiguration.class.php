<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony-1.4.20/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

	public function setup() {

		$this->enablePlugins(array(

			'sfDoctrinePlugin',
			'sfDoctrineGuardPlugin',
			'sfDoctrineOAuthPlugin',
			'sfMelodyPlugin'
		));

		//$this->enableAllPluginsExcept(array('sfPropelPlugin'));
	}
}
