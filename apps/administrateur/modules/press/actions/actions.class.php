<?php

require_once dirname(__FILE__).'/../lib/pressGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pressGeneratorHelper.class.php';

/**
 * press actions.
 *
 * @package    toaberlin
 * @subpackage press
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pressActions extends autoPressActions {

	public function executePromote() {

		$press = Doctrine::getTable('Press')->findOneById($this->getRequestParameter('id'));

		$press->promote();
		$this->redirect('@press');
	}

	public function executeDemote() {

		$press = Doctrine::getTable('Press')->findOneById($this->getRequestParameter('id'));

		$press->demote();
		$this->redirect('@press');
	}
}
