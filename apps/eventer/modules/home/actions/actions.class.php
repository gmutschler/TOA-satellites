<?php

/**
 * home actions.
 *
 * @package    toaberlin
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions {

	// User handling actions
	public function executeLogin(sfWebRequest $request) {

		// TODO: make this work only for not logged in users!
		$this->getUser()->connect('eventbrite');
	}

	// TODO: adjust the default SF actions
	public function executeIndex(sfWebRequest $request) {
	}
}
