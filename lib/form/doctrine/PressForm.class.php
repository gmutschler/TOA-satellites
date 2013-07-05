<?php

/**
 * Press form.
 *
 * @package    toaberlin
 * @subpackage form
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PressForm extends BasePressForm {

	public function configure() {

		// important fields
		$this->useFields(array(

			'title',
			'date',
			'media',
			'url'
		));

		// widgets
		$this->setWidget('title', new sfWidgetFormInput(

			array(),
			array(
				'size'	=> 64
			)
		));	
		$this->setWidget('media', new sfWidgetFormInput(

			array(),
			array(
				'size'	=> 64
			)
		));
		$this->setWidget('url', new sfWidgetFormInput(
		
			array(),
			array(

				'size'	=> 100
			)
		));
	}
}
