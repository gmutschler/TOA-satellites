<?php
class VenueCollectionForm extends sfForm {

	public function configure() {

		if(!$event = $this->getOption('event')) throw new InvalidArgumentException('You must provide an event object.');

		for($i = 0; $i < $this->getOption('size', 2); $i++) {

			$venue = new Venue();
			$venue->Events[0] = $event;

			$form = new VenueForm($venue);

			$this->embedForm($i, $form);
		}

		$this->mergePostValidator(new VenueFormValidatorSchema());
	}
}
?>
