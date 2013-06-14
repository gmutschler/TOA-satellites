<?php

/**
 * Venue form.
 *
 * @package    toaberlin
 * @subpackage form
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VenueForm extends BaseVenueForm {

	public function configure() {

		$this->useFields(array(

			'name',
			'address',
			'postal_code',
			'city'
		));

		$this->validatorSchema['name']->setOption('required', false);
		$this->validatorSchema['address']->setOption('required', false);
		$this->validatorSchema['postal_code']->setOption('required', false);
		$this->validatorSchema['city']->setOption('required', false);
/*
		$this->setValidator('name', new sfValidatorString(array(

			'required' => false
		)));

		$this->setValidator('address', new sfValidatorString(array(

			'required' => false
		)));

		$this->setValidator('postal_code', new sfValidatorString(array(

			'required' => false
		)));

		$this->setValidator('city', new sfValidatorString(array(

			'required' => false
		)));
*/
	}
}
