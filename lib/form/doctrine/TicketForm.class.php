<?php

/**
 * Ticket form.
 *
 * @package    toaberlin
 * @subpackage form
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TicketForm extends BaseTicketForm {

	public function configure() {

		$this->useFields(array(

			'name',
			'description',
			'price',
			'quantity_declared'
		));

		// zero this out so we can validate embedded forms easily
		$this->validatorSchema['name']->setOption('required', false);
		$this->validatorSchema['description']->setOption('required', false);
		$this->validatorSchema['price']->setOption('required', false);
		$this->validatorSchema['quantity_declared']->setOption('required', false);
	}
}
