<?php

namespace Kompakt\Handlers;

class Router {
	private $routingInfos;
	private $path;

	public function loadRouting($path) {
		$routingFile = file_get_contents($path);
		$this->path = $path;

		$routingJSON = json_decode($routingFile,true);
		$this->routingInfos = $routingJSON;
	}

	public function saveRouting() {
		file_put_contents($this->path,json_encode($this->routingInfos));
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