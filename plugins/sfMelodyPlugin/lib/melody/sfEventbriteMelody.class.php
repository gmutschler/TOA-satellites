<?php /*

	Eventbrite.com implementation for sfMelody plugin
	Maciej Taranienko <maciej@canadel.ee>

	rev 2013-06-13
*/

class sfEventbriteMelody extends sfMelody2 {

	protected function initialize($config) {

		// Eventbrite defaults
		$this->setRequestAuthUrl('https://www.eventbrite.com/oauth/authorize');
		$this->setAccessTokenUrl('https://www.eventbrite.com/oauth/token');
		$this->setNamespaces(array(

			'default'	=> 'https://www.eventbrite.com/json',
			'xml'		=> 'https://www.eventbrite.com/xml'
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
		if(count($parameters)) $this->addAccessParameters($parameters);

		$params = $this->call($url, http_build_query($this->getAccessParameters()), null, 'POST');
		$params = json_decode($params, true);	// ** would be wise to check curl response code for timeouts inside the call() mehtod :/

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

		// ** verify the reasonability of those methods...
		// NOTE: our token never expires
		if(count($params) > 0) $token->setParams($params);
		$this->setToken($token);
		$token->setIdentifier($this->getIdentifier());

		return $token;
	}

	// Override call() method by adding the $headers possibility
	protected function call($url, $url_params = null, $post_params = null, $method = 'POST', $headers = array()) {

		$ci = curl_init();

		if(is_array($url_params) && count($url_params) > 0) $url_params = http_build_query($url_params);

		if(in_array($method, array('PUT', 'DELETE'))) curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method);
		elseif($method == 'POST') curl_setopt($ci, CURLOPT_POST, true);
		elseif($method == 'GET' && !empty($url_params)) $url = $this->appendToUrl($url, $url_params);

		if(in_array($method, array('PUT', 'DELETE', 'POST'))) {

			if(!is_null($post_params)) {

				$url = $this->appendToUrl($url, $url_params);
				curl_setopt($ci, CURLOPT_POSTFIELDS, $post_params);
			}
			else curl_setopt($ci, CURLOPT_POSTFIELDS, $url_params);
		}

		// add headers if needed
		if(count($headers)) curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ci, CURLOPT_HEADER, false);
		curl_setopt($ci, CURLOPT_URL, $url);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);

		if($this->getLogger()) {

			$message = sprintf('{OAuth} call %s with params %s | %s', $url, $url_params, $post_params);
			$this->getLogger()->info($message);
		}

		$response = curl_exec($ci);
		curl_close ($ci);

		return $response;
	}

	// Local form of get() method
	// TODO: consider refactoring parent's get() method to this somehow
	protected function localGet($action, $params = array()) {

		$this->setCallParameter('app_key', $this->getKey());
		if(count($params)) $this->addCallParameters($params);

		$url = $this->getNamespace($this->getCurrentNamespace()) . '/' . $action;	// quick URL formatting

		$response = $this->call($url, http_build_query($this->getCallParameters()), null, 'GET', array('Authorization: Bearer ' . $this->getToken()->getTokenKey()));

		return json_decode($response, true);
	}

	// # Eventbrite API communication methods
	public function getEvent($id) {

		return $this->localGet('event_get', array(

			'id'	=> $id
		));
	}
	public function getAttendees($id) {

		// ** enhace with more params if needed
		return $this->localGet('event_list_attendees', array(

			'id'	=> $id
		));
	}
	public function getUserData($idOrEmail) {

		$params = array();

		if(!is_null($idOrEmail)) {

			if(is_numeric($idOrEmail)) $params['user_id'] = $idOrEmail;
			else $params['email'] = $idOrEmail;
		}

		return $this->localGet('user_get', $params);
	}
	public function getEventsForUser($email) {

		return $this->localGet('user_list_events', array(

			'email'	=> $email
		));
	}
	public function getTicketsForUser($email) {

		return $this->localGet('user_list_tickets', array(

			'email' => $email,
			'type' => 'all'
		));
	}
	public function getOrganisersForCurrentUser() {

		return $this->localGet('user_list_organizers');	// NOTE: This fails
	}
}
