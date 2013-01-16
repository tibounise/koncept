<?php
/**
 * Koncept Localizator
 * @package panel
 */

/**
 * Localizator for koncept
 * 
 * @author TiBounise <contact@tibounise.com>
 */
class Localization {
	/**
	 * Language strings
	 * 
	 * @var array
	 * @access protected
	 */
	protected $locales;

	/**
	 * Identifier of the language
	 * 
	 * @var string
	 * @access protected
	 */
	protected $language;

	/**
	 * Path where the localization files are
	 * 
	 * @var string
	 * @access protected
	 */
	protected $rootpath;

	/**
	 * Set up the localization path
	 * 
	 * @access public
	 * @param string $rootpath Location to the localization files
	 */
	public function __construct($rootpath = 'localization/') {
		$this->rootpath = $rootpath;
	}

	/**
	 * Load the localization
	 * 
	 * @param string $lang Language identifier
	 * @access public
	 * @return null
	 */
	public function loadLocales($lang) {
		$locale_file = json_decode(file_get_contents($this->rootpath.$lang.'.json'),true);
		$this->language = $locale_file['language'];
		$this->locales = $locale_file['locales'];
		return null;
	}

	/**
	 * Returns the requested string
	 * 
	 * @access public
	 * @return string
	 */
	public function getStr() {
		$args = func_get_args();
		$args[0] = $this->locales[$args[0]];
		return call_user_func_array('sprintf',$args);
	}
}

?>