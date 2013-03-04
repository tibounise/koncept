<?php

namespace Kompakt\Handlers;

class Elementy {
	protected $index;
	protected $indexpath;

	public function openIndex($indexpath) {
		$this->indexpath = $indexpath;
		$json = json_decode(file_get_contents($indexpath),true);
		if ($json !== null) {
			$this->index = $json;
		} else {
			return false;
		}
	}

	public function saveIndex() {
		$json = json_encode($this->index);
		return file_put_contents($this->indexpath,$json,LOCK_EX);
	}

	public function addIndex($id,$path) {
		$this->index['files'][$id] = $path;
	}

	public function rmIndex($id) {
		unset($this->index['files'][$id]);
	}

	public function getNewId() {
		if (count($this->index['files']) == 0) {
			return 0;
		} else {
			$array_keys = array_keys($this->index['files']);
			rsort($array_keys);
			return $array_keys[0] + 1;
		}
	}
}

?>