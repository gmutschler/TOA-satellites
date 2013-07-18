<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony-1.4.20/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

	public function setup() {

		$this->enablePlugins(array(

			// eventer app
			'sfDoctrinePlugin',
			'sfDoctrineGuardPlugin',
			'sfDoctrineOAuthPlugin',
			'sfMelodyPlugin',
			'sfThumbnailPlugin',

			// administrateur app
			'sfJqueryReloadedPlugin',
			'sfAdminDashPlugin',
			'csDoctrineActAsSortablePlugin',
			'sfFCKEditorPlugin'
		));

		//$this->enableAllPluginsExcept(array('sfPropelPlugin'));
	}
}
