<?php /*

	Eventbrite.com implementation for sfMelody plugin,
	by maciej@canadel.ee

	rev 2013-05-23
*/

class sfEventbriteMelody extends sfMelody2 {

	protected function initialize($config) {

		// Eventbrite defaults
		$this->setRequestAuthUrl('https://www.eventbrite.com/oauth/authorize');
		$this->setAccessTokenUrl('https://www.eventbrite.com/oauth/token');
		$this->setNamespaces(array(

			'default'	=> 'https://www.eventbrite.com/json/',
			'xml'		=> 'TODO'
		));
	}

	// # sfMelody2 and sfOAuth2 overrides

	// Append parameter to default sfMelody2's connect behaviour
	public function connect($user, $auth_parameters = array(), $request_params = array()) {

		$auth_parameters['response_type'] = 'code';

		parent::connect($user, $auth_parameters, $request_params);
	}

	// Completely override sfOAuth2's original access token behaviour
	public function getAccessToken($verifier, $parameters = array()) {

		$url = $this->getAccessTokenUrl();
		$this->setAccessParameter('grant_type', 'authorization_code');
		$this->setAccessParameter('client_id', $this->getKey());
		$this->setAccessParameter('client_secret', $this->getSecret());
		$this->setAccessParameter('code', $verifier);

		$this->addAccessParameters($parameters);
/*
		print "<pre>";
		print_r($this->getAccessParameters());
*/
		$params = $this->call($url, http_build_query($this->getAccessParameters()), null, 'POST');
		$params = json_decode($params, true);	// ** would be wise to check curl response code for timeouts inside the call() mehtod :/
/*
		print_r($params);
		print "</pre>";
		die();
*/

		$access_token = isset($params['access_token'])?$params['access_token']:null;

		if(is_null($access_token) && $this->getLogger()) {

			$error = sprintf('{OAuth} access token failed - %s returns %s', $this->getName(), print_r($params, true));
			$this->getLogger()->err($error);

			// TODO: this should break the execution!
			return false;
		}
		else if($this->getLogger()) {

			$message = sprintf('{OAuth} %s return %s', $this->getName(), print_r($params, true));
			$this->getLogger()->info($message);
		}

		// create token object for returning
		$token = new Token();
		$token->setTokenKey($access_token);
		$token->setName($this->getName());
		$token->setStatus(Token::STATUS_ACCESS);
		$token->setOAuthVersion($this->getVersion());

		unset($params['access_token']);

		// TODO: think of doing something with token_type = bearer
		//       also verify the reasonability of those methods...
		if(count($params) > 0) $token->setParams($params);
		$this->setExpire($token);
		$this->setToken($token);
		$token->setIdentifier($this->getIdentifier());	// get identifier maybe need the access token
		$this->setToken($token);

		return $token;
	}

	// # Token methods
	// TODO: Update and modify them :)
	protected function setExpire(&$token) {

		if($token->getParam('expires')) {

			$token->setExpire(time() + $token->getParam('expires'));
		}
	}
}
