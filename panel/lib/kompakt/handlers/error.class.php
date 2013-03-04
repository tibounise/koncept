<?php

namespace Kompakt\Handlers;

class Error {
	private $message;

	public function registerMessage($message) {
		$this->message = $message;
	}

	public function issetMessage() {
		return !empty($this->message);
	}

	public function getMessage() {
		return $this->message;
	}
}

?>