<?php

/**
 * Program form.
 *
 * @package    toaberlin
 * @subpackage form
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProgramForm extends BaseProgramForm {

	public function configure() {

		// all-around-the-clock logic, unset some stuff
		unset(

			$this['created_at'],
			$this['updated_at']
		);

		// widgets and validators
		$this->setWidget('kind', new sfWidgetFormChoice(array(

			'choices' => array(
				'Talks'			=> 'Talks',
				'Pillow Talks'		=> 'Pillow Talks',
				'Knowshop'		=> 'Knowshop',
				'Performance'		=> 'Performance',
				'Pitch Session'		=> 'Pitch Session'
			)
		)));

		$this->setWidget('room', new sfWidgetFormChoice(array(

			'choices' => array(
				'The Terrace'		=> 'The Terrace',
				'The Gallery'		=> 'The Gallery',
				'The Dock'		=> 'The Dock',
				'Heinz'			=> 'Heinz',
				'Rummel'		=> 'Rummel',
				'Hütte'			=> 'Hütte',
				'Confession Chair'	=> 'Confession Chair'
			)
		)));

		$this->setWidget('photo', new sfWidgetFormInputFileEditable(array(

			'file_src'	=> '/images/content/program-cms/' . $this->getObject()->photo,
			'edit_mode'	=> !$this->isNew(),
			'is_image'	=> true,
			'with_delete'	=> false
		)));
		$this->setValidator('photo', new sfValidatorFile(array(

			'mime_types'	=> 'web_images',
			'path'		=> sfConfig::get('sf_web_dir') . '/images/content/program-cms/',
			'required'	=> false
		)));

		$this->setWidget('description', new sfWidgetFormFCKEditor(

			array(
//				'width'		=> 585,
				'height'	=> 450,
				'config'	=> 'vendor/fckconfig.js',
				'tool'		=> 'TOA'
			)
		));
	}
}
