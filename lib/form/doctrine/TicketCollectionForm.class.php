<?php
class TicketCollectionForm extends sfForm {

	public function configure() {

		if(!$event = $this->getOption('event')) throw new InvalidArgumentException('You must provide an Event object.');

		for($i = 0; $i < $this->getOption('size', 2); $i++) {

			$ticket = new Ticket();
			$ticket->Event = $event;

			$form = new TicketForm($ticket);

			$this->embedForm($i, $form);
		}

		$this->mergePostValidator(new TicketFormValidatorSchema());
	}
}
?>
