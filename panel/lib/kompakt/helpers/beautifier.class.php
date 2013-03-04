<?php

namespace Kompakt\Helpers;

class Beautifier {
	public static function JSON($json) {
		if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
			return json_encode(json_decode($json),JSON_PRETTY_PRINT);
		} else {
			return str_replace(array('{','}',',"'), array("{\n    ","\n}",",\n    \""), $json);
		}
	}
}

?>