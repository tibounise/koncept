<?php

namespace Kompakt\Handlers;

/**
 * Key-value database engine
 * 
 * @author TiBounise <contact@tibounise.com>
 * @package Fukon
 * @version 1.02
 */
class Fukon {
	/**
	 * Storage of the keys and values
	 * 
	 * @var array
	 */
	protected $keysDB;

	/**
	 * Constructor - initialise the array
	 * 
	 * @access public
	 * @return none
	 */
	public function __construct() {
		$this->keysDB = array();
	}

	/**
	 * Test if a key exists
	 * 
	 * @access public
	 * @param string $keyname Key to test
	 * @return bool Returns true if the key exists
	 */
	public function issetKey($keyname) {
		return isset($this->keysDB[$keyname]);
	}

	/**
	 * Set a value to a key (existing or not)
	 * 
	 * @access public
	 * @param string $keyname Key name
	 * @param string $keyvalue Value of the key
	 * @return none
	 */
	public function setKey($keyname,$keyvalue) {
		$this->keysDB[$keyname] = $keyvalue;
	}

	/**
	 * Deletes a key
	 * 
	 * @access public
	 * @param string $keyname Key to delete
	 * @return bool Return true if the key is deleted
	 */
	public function delKey($keyname) {
		if (isset($this->keysDB[$keyname])) {
			unset($this->keysDB[$keyname]);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Send the value of a key
	 * 
	 * @access public
	 * @param string $keyname Key to get the content from
	 * @return mixed Returns the value of the key
	 * @throws Exception 404 error
	 */
	public function getKey($keyname) {
		if (isset($this->keysDB[$keyname]))
			return $this->keysDB[$keyname];
		else
			throw new Exception('Key not found - '.$keyname,404);
	}

	/**
	 * Imports a JSON file
	 * 
	 * @access public
	 * @param string $json JSON string
	 * @return bool Returns false if the database isn't empty or the JSON isn't good, otherwise returns true
	 */
	public function pushJSON($json) {
		if (count($this->keysDB) <= 0) {
			$decodedJSON = json_decode($json,true);
			if ($decodedJSON === null) {
				return false;
			} else {
				$this->keysDB = $decodedJSON;
				return true;
			}
		} else {
			return false;
		}
	}

	/**
	 * Returns a JSON file of the database
	 * 
	 * @access public
	 * @return mixed Return the JSON of the database or false if the database is empty
	 */
	public function pullJSON() {
		if (count($this->keysDB) > 0)
			return json_encode($this->keysDB);
		else
			return false;
	}
}

?>