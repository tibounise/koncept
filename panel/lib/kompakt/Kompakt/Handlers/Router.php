<?php

namespace Kompakt\Handlers;

class Router {
	private $routingInfos;

	const path = '../config/routes.json';

	public function loadRouting() {
		$routingFile = file_get_contents(self::path);

		$routingJSON = json_decode($routingFile,true);
		$this->routingInfos = $routingJSON;
	}

	public function saveRouting() {
		file_put_contents(self::path,json_encode($this->routingInfos));
	}

	public function registerNewRoute($regex,$controller,$variables) {
		$this->routingInfos[] = array('regex' => $regex,
									  'controller' => $controller);
	}

	public function issetRoute($id) {
		return isset($this->routingInfos[$id]);
	}

	public function getRoute($id) {
		return $this->routingInfos[$id];
	}

	public function removeRoute($id) {
		unset($this->routingInfos[$id]);
	}

	public function editRoute($id,$regex,$controller,$variables) {
		$this->routingInfos[$id] = array('regex' => $regex,
										 'controller' => $controller);
	}
}

?>