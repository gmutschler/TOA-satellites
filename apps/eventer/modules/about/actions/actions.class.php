<?php

/**
 * about actions.
 *
 * @package    toaberlin
 * @subpackage about
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class aboutActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {
	}

	public function executeTeam(sfWebRequest $request) {
	}

	public function executePress(sfWebRequest $request) {

		$this->releases = Doctrine_Core::getTable('Press')->findAllSorted('asc');
	}

	public function executeContact(sfWebRequest $request) {
	}
}
