<?php

namespace Kompakt\Helpers;

class Sanitize {
	public static function Email($input) {
		return filter_var($input,FILTER_SANITIZE_EMAIL);
	}
	public static function Urlencode($input) {
		return filter_var($input,FILTER_SANITIZE_ENCODED);
	}
	public static function Float($input) {
		return filter_var($input,FILTER_SANITIZE_NUMBER_FLOAT);
	}
	public static function Integer($input) {
		return filter_var($input,FILTER_SANITIZE_NUMBER_INT);
	}
}

?>