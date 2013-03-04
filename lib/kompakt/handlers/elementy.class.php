<?php

namespace Kompakt\Handlers;

class Elementy {
	protected $index;

	public function openIndex($indexpath) {
		$json = json_decode(file_get_contents($indexpath),true);
		if ($json !== null) {
			$this->index = $json;
		} else {
			return false;
		}
	}
}

?>