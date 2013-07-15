<?php

require_once dirname(__FILE__).'/../lib/speakerGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/speakerGeneratorHelper.class.php';

/**
 * speaker actions.
 *
 * @package    toaberlin
 * @subpackage speaker
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class speakerActions extends autoSpeakerActions {

	public function executePromote() {

		$press = Doctrine::getTable('Speaker')->findOneById($this->getRequestParameter('id'));

		$press->promote();
		$this->redirect('@speaker');
	}

	public function executeDemote() {

		$press = Doctrine::getTable('Speaker')->findOneById($this->getRequestParameter('id'));

		$press->demote();
		$this->redirect('@speaker');
	}
}
