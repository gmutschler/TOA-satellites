<?php
class VenueFormValidatorSchema extends sfValidatorSchema {

	protected function configure($options = array(), $messages = array()) {

		$this->addMessage('name', 'Name is required.');
		$this->addMessage('address', 'Address is required.');
		$this->addMessage('postal_code', 'Postal code is required.');
		$this->addMessage('city', 'City is required.');
	}

	protected function doClean($values) {

		$errorSchema = new sfValidatorErrorSchema($this);

		// validation
		foreach($values as $key => $value) {

			$errorSchemaLocal = new sfValidatorErrorSchema($this);

			// something filled in, but something left out
			if(($value['address'] or $value['postal_code'] or $value['city']) and !$value['name'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'name');	

			if(($value['name'] or $value['postal_code'] or $value['city']) and !$value['address'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'address');

			if(($value['name'] or $value['address'] or $value['city']) and !$value['postal_code'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'postal_code');

			if(($value['name'] or $value['address'] or $value['postal_code']) and !$value['city'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'city');

			// nothing filled in
			if(!$value['name'] and !$value['address'] and !$value['postal_code'] and !$value['city']) unset($values[$key]);

			// errors?
			if(count($errorSchemaLocal)) $errorSchema->addError($errorSchemaLocal, (string) $key);
		}

		// errors for the main form
		if(count($errorSchema)) throw new sfValidatorErrorSchema($this, $errorSchema);

		return $values;
	}
}
?>
