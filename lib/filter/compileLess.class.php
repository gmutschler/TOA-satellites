<?php /*
	custom LESS pre-compiler
	for usage with LESSPHP from http://leafo.net/lessphp/

	maciej@canadel.ee
*/
class lessCompiler extends sfFilter {

	public function execute($filterChain) {

		if($this->isFirstCall()) {

			// compile less - if we're good to
			if(
				file_exists($lessSrc = sfConfig::get('sf_app_config_dir') . '/style.less') and
				file_exists($lessOut = sfConfig::get('sf_web_dir') . '/css/main.css') and
				is_writable($lessOut)
			) {

				// ** warning: this may turn to hell if we got the library included by sfAutoLoader
				require_once sfConfig::get('sf_lib_dir') . '/vendor/lessc-0.3.9.inc.php';

				$less = new lessc;
				$less->setPreserveComments(true);
				$less->setFormatter('compressed');

				$less->checkedCompile($lessSrc, $lessOut);

				unset($lessSrc, $lessOut);
			}
		}

		// proceed with execution
		$filterChain->execute();
	}
}
?>
