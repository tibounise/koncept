<?php

namespace Kompakt\Handlers;

/**
 * @package Kompakt\Handlers
 */
class Elementy {
	protected $index;
	protected $indexpath;

	/**
	 * Open the index
	 * 
	 * @param string $indexpath Path to the index file
	 * @return bool Status of the index opening
	 * @access public
	 */
	public function openIndex($indexpath) {
		$this->indexpath = $indexpath;
		$json = json_decode(file_get_contents($indexpath),true);
		if ($json !== null) {
			$this->index = $json;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Save the index
	 * 
	 * @return bool Status of the file save
	 * @access public
	 */
	public function saveIndex() {
		return file_put_contents($this->indexpath,json_encode($this->index),LOCK_EX);
	}

	/**
	 * Add a file to the index
	 * 
	 * @param int $id Identifier of the element
	 * @param string $path Path of the element
	 * @access public
	 */
	public function addIndex($id,$path) {
		$this->index['files'][$id] = $path;
	}

	/**
	 * Remove an element from the index
	 * 
	 * @param int $id Identifier of the element
	 * @access public
	 */
	public function rmIndex($id) {
		unset($this->index['files'][$id]);
	}

	/**
	 * Gets a new ID for a new element
	 * 
	 * @return int New ID for a new element
	 * @access public
	 */
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