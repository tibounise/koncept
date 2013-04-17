<?php

namespace Deone\Handlers;

class Deone {
	public function __construct() {
		session_start();
	}

	public static function getFetcher() {
		return new \Deone\Handlers\Fetcher;
	}

	public static function getRouter() {
		return new \Deone\Handlers\Router;
	}
}

?>