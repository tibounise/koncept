<?php

namespace Kompakt\Handlers;

/**
 * @package Kompakt\Handlers
 */
class Error {
	/**
	 * Value of the message
	 * 
	 * @var $message Value of the message
	 * @access private
	 */
	private $message;

	/**
	 * Registers a message in the Error handler
	 * 
	 * @param string $message Message of the error
	 * @access public
	 */
	public function registerMessage($message) {
		$this->message = $message;
	}

	/**
	 * Checks if a message was set up
	 * 
	 * @return bool Existence of a message
	 * @access public
	 */
	public function issetMessage() {
		return !empty($this->message);
	}

	/**
	 * Get the stored message
	 * 
	 * @return string Stored error message
	 * @access public
	 */
	public function getMessage() {
		return $this->message;
	}
}

?>