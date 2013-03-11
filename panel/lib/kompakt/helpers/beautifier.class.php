<?php

namespace Kompakt\Helpers;

/**
 * @package Kompakt\Helpers
 */
class Beautifier {
	/**
	 * Beautify JSON to display it in textareas
	 * 
	 * @param string $json JSON to beautify
	 * @return string Beautified JSON
	 * @access public
	 * @static
	 */
	public static function JSON($json) {
		if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
			return json_encode(json_decode($json),JSON_PRETTY_PRINT);
		} else {
			return str_replace(array('{','}',',"'), array("{\n    ","\n}",",\n    \""), $json);
		}
	}

	/**
	 * Transform a raw filesize() to a readable format
	 * 
	 * @param int $filesize Filesize in octets
	 * @return string Readable file size
	 * @access public
	 * @static
	 */
	public static function Filesize($filesize) {
    	$units = array('o','Ko','Mo','Go','To','Po','Eo','Zo','Yo');
    	$power = $filesize > 0 ? floor(log($filesize, 1000)) : 0;
    	if (!isset($units[$power])) {
    		$power = count($units) - 1;
    	}
    	return number_format($filesize / pow(1000, $power),2,'.',' ').' '.$units[$power];
	}
}

?>