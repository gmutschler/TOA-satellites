<?php
class TicketFormValidatorSchema extends sfValidatorSchema {

	protected function configure($options = array(), $messages = array()) {

		$this->addMessage('name', 'Name is required.');
		$this->addMessage('description', 'Description is required.');
		$this->addMessage('price', 'Price is required.');
		$this->addMessage('quantity_declared', 'You need to declare overall quantity.');
	}

	protected function doClean($values) {

		$errorSchema = new sfValidatorErrorSchema($this);

		// validation
		foreach($values as $key => $value) {

			$errorSchemaLocal = new sfValidatorErrorSchema($this);

			// something filled in, but something left out
			if(($value['description'] or $value['price'] or $value['quantity_declared']) and !$value['name'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'name');	

			if(($value['name'] or $value['price'] or $value['quantity_declared']) and !$value['description'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'description');

			if(($value['name'] or $value['description'] or $value['quantity_declared']) and !$value['price'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'price');

			if(($value['name'] or $value['description'] or $value['price']) and !$value['quantity_declared'])
				$errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'quantity_declared');

			// nothing filled in
			if(!$value['name'] and !$value['description'] and !$value['price'] and !$value['quantity_declared']) unset($values[$key]);

			// errors?
			if(count($errorSchemaLocal)) $errorSchema->addError($errorSchemaLocal, (string) $key);
		}

		// errors for the main form
		if(count($errorSchema)) throw new sfValidatorErrorSchema($this, $errorSchema);

		return $values;
	}
}
?>
