<?php

namespace Kompakt\Helpers;

/**
 * @package Kompakt\Helpers
 */
class Sanitize {
	/**
	 * Sanitzes an email adress
	 * 
	 * @param string $input Email to sanitize
	 * @return string Sanitized email
	 * @access public
	 * @static
	 */
	public static function Email($input) {
		return filter_var($input,FILTER_SANITIZE_EMAIL);
	}

	/**
	 * Encodes a string to url format
	 * 
	 * @param string $input String to re-format
	 * @return string Formatted string
	 * @access public
	 * @static
	 */
	public static function Urlencode($input) {
		return filter_var($input,FILTER_SANITIZE_ENCODED);
	}
}

?>