<?php

namespace Deone\Handlers;

class Deone {
	public $Router;

	public function __construct() {
		session_start();
		$this->Router = new \Deone\Handlers\Router;
	}

	public static function getFetcher() {
		return new \Deone\Handlers\Fetcher;
	}
}

?>