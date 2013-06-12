<?php
/**
 * Actions class for Melody
 *
 * @author Gordon Franke <info@nevalon.de>
 * @since 29 août 2010
 * @modified Maciej Taranienko <maciej@canadel.ee>
 */
class BasesfMelodyActions extends sfMelodyBaseActions {

  public function executeAccess(sfWebRequest $request) {

    $melody = $this->getMelody();
    $melody->setCallback('@melody_access?service='.$melody->getName());

    // make sure the token does not contain any errors!
    if(!$access_token = $melody->getAccessToken($this->getCode())) {

	// set error message
	$this->getUser()->setFlash('error', 'There was an authentication error. Please try again');

	// remove any session redirections
	if($this->getUser()->hasAttribute('loginCallback')) $this->getUser()->getAttributeHolder()->remove('loginCallback');

	// get the fuck out of here
	$this->redirect($melody->getConfigParameter('callback'));	// ** use the callback form app.yml

	die();
    }

    // process with normal execution otherwise
    $melody->setToken($access_token);

    $user = null;

    if($this->getUser()->isAuthenticated())	// TODO: we never checked this workflow
    {
      $user = $this->getUser()->getGuardUser();

      $conflict = !$melody->getUserFactory()->isCompatible($user);
      $event = new sfEvent($this, 'melody.filter_user', array('melody' => $melody, 'conflict' => $conflict));
      $dispatcher = $this->getContext()->getEventDispatcher();
      $user = $dispatcher->filter($event, $user)->getReturnValue();
    }

    else {
      /*
      // ** this causes bugs if we have *any* users in the db... and btw, FUCK the old tokens!  // maciej@canadel.ee
      $old_token = $this->getOrmAdapter('Token')->findOneByNameAndIdentifier($melody->getName(), $melody->getIdentifier());

      //try to get user from the token
      if($old_token) $user = $old_token->getUser();

      //try to get user by melody		
      if(!$user) $user = $this->getGuardAdapter()->findByMelody($melody);

      */
      $create_user = sfConfig::get('app_melody_create_user', false);
      $redirect_register = sfConfig::get('app_melody_redirect_register', false);


      $create_user = $melody->getConfigParameter('create_user', $create_user);
      $redirect_register = $melody->getConfigParameter('redirect_register', $redirect_register);

      //create a new user if needed
      if(!$user and ($create_user or $redirect_register)) {

        $user = $melody->getUser();

	// redirect workflow
        if($redirect_register) {

          $this->getUser()->setAttribute('melody_user', serialize($user));
          $this->getUser()->setAttribute('melody', serialize($melody));

          $this->redirect($redirect_register);
        }

	// create workflow (gay)
        else $user->save();
      }
    }

    if($user) {	// ** eventbrite does not really ever use it

      $access_token->setUserId($user->getId());

      if(!$this->getUser()->isAuthenticated()) $this->getUser()->signin($user, sfConfig::get('app_melody_remember_user', true));
    }

    $this->getUser()->addToken($access_token);

    $this->redirect($this->getCallback());
  }
}
