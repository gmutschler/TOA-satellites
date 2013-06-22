<?php

/**
 * home actions.
 *
 * @package    toaberlin
 * @subpackage home
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {

		// hackish way of forwarding after redirected from login
		if($this->getUser()->hasAttribute('loginCallback')) {

			$callback = explode('/', $this->getUser()->getAttribute('loginCallback'));
			$this->getUser()->getAttributeHolder()->remove('loginCallback');

			$this->forward($callback[0], $callback[1]);
		}
	}

	// User handling actions
	public function executeLogin(sfWebRequest $request) {

		if(!$this->getUser()->isAuthenticated()) $this->getUser()->connect('eventbrite');
		else $this->forward('home', 'index');
	}
	/*
	public function executeLogout(sfWebRequest $request) {	// ** CONSIDER copy sfGuard logout action here and UNSET SESSION STUFF there as it bugs!

		if($this->getUser()->isAuthenticated()) $this->getUser()->getMelodyUser()->logOut(); // ** notice: this eats all our memory and dies
		else $this->forward('home', 'index');
	}
	*/
	public function executeLoggedin(sfWebRequest $request) {

		// We have propper settings from the main plugin actions
		if($this->getUser()->hasAttribute('melody') and $this->getUser()->hasAttribute('melody_user')) {

			// get the data and unset them from session
			$melodyObj = unserialize($this->getUser()->getAttribute('melody'));
			$userObj = unserialize($this->getUser()->getAttribute('melody_user'));
			$this->getUser()->getAttributeHolder()->remove('melody');
			$this->getUser()->getAttributeHolder()->remove('melody_user');

			// fetch API user data
			$userData = $melodyObj->getUserData(null);

			// check for errors
			if(isset($userData['error'])) throw new sfException('Oops... something went wrong with the Eventbrite API response!');

			// check if we have a user of given			** this query could be moved to some model method like FindOneByEmail()
			$q = Doctrine_Query::create()
				->from('sfGuardUser u')
				->where('u.email_address = ?', $userData['user']['email'])
				->limit(1)
			;
			$qResult = $q->execute();


			// existing user (check if a user with given email already exists)
			if($qResult->count()) $userObj = $qResult->getFirst();

			// new user (create sfGuardUser)
			else {

				//$user = new sfGuardUser();
				$userObj->setUsername('Eventbrite_' . $userData['user']['user_id']);
				$userObj->setPassword('maładziec!');						// ** this isn't ever used :)
				$userObj->setFirstName($userData['user']['first_name']);
				$userObj->setLastName($userData['user']['last_name']);
				$userObj->setEmailAddress($userData['user']['email']);
				$userObj->save();

				// create the organiser and attendee profiles too
				$organiserObj = new Organiser();
				$organiserObj->setGuardUser($userObj);
				$organiserObj->setName($userObj->getFirstName() . ' ' . $userObj->getLastName());
				$organiserObj->save();
				
				$attendeeObj = new Attendee();
				$attendeeObj->setGuardUser($userObj);
				$attendeeObj->save();
			}

			// TODO: check for main ticket!

			// sign in and save the user
			$this->getUser()->signin($userObj, sfConfig::get('app_melody_remember_user', true));

			// token methods
			$melodyObj->getToken()->setUserId($userObj->getId());
			$this->getUser()->addToken($melodyObj->getToken());
		}

		// Something went wrong and we should not be here
		else {

			// setFlash() and forward to some error?
			$this->getUser()->setFlash('error', 'There was an error logging you in. Please try again');
		}

		// Always forward to home/index
		// ** home alone will take care of callbacks (if any)
		$this->forward('home', 'index');
	}
    
    public function executeColophon(sfWebRequest $request) { }
    public function executePrivacy(sfWebRequest $request) { }
}
