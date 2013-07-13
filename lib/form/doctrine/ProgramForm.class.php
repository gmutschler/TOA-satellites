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
	}
}
