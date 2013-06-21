<?php

/**
 * Organiser form.
 *
 * @package    toaberlin
 * @subpackage form
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrganiserForm extends BaseOrganiserForm {

	public function configure() {

		// important fields
		$this->useFields(array(

			'name',
			'description',
			'logo',
			'url',
			'twitter',
			'facebook'
		));

		// widgets and validators
		$this->setWidget('logo', new sfWidgetFormInputFileEditable(array(

			'file_src'	=> '/uploads/organiser_images/' . $this->getObject()->logo,
			'edit_mode'     => !$this->isNew(),
			'is_image'      => true,
			'with_delete'   => false	// TODO: think about it
		)));
		$this->setValidator('logo', new sfValidatorFile(array(

			'mime_types'	=> 'web_images',
			'path'		=> sfConfig::get('sf_upload_dir') . '/organiser_images',
			'required'	=> false
		)));
		$this->validatorSchema['logo_delete'] = new sfValidatorBoolean();

		$this->setWidget('name', new sfWidgetFormInput(

			array('label' => 'Title'),
			array('placeholder' => 'Your organizer name')
		));
		$this->setWidget('description', new sfWidgetFormTextarea(

			array('label' => 'Description'),
			array('placeholder' => 'Few words about you as an organizer')
		));
		$this->setWidget('url', new sfWidgetFormInput(

			array('label' => 'URL address'),
			array('placeholder' => 'Your custom URL address')
		));
		$this->setWidget('twitter', new sfWidgetFormInput(

			array('label' => 'Twitter URL'),
			array('placeholder' => 'Your Twitter URL address')
		));
		$this->setWidget('facebook', new sfWidgetFormInput(

			array('label' => 'Facebook URL'),
			array('placeholder' => 'Your Facebook URL address')
		));

		// TODO: add validators for twitter and facebook so people won't cheat it :)
	}

	// override the saving method
	public function doSave($con = null) {

		// LATER: think if we need assigning to user or does it happen automagically?
		return parent::doSave($con);
	}
}
