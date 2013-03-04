<?php

class Kompakt {
	public $User;
	public $Config;

	public function __construct() {
		session_start();
		session_regenerate_id();
	}

	public function configureApp($params) {
		if ($params & 1) { // USER_HANDLING parameter
			$this->User = new Kompakt\Handlers\User;
		}
		if ($params & 2) { // CONFIG parameter
			$this->Config = new Kompakt\Handlers\Fukon;
		}
		if ($params & 4) { // FETCHER parameter
			$this->Fetcher = new Kompakt\Handlers\Fetcher;
		}
		if ($params & 8) { // LOG_PROTECTION parameter
			$this->User->logProtection();
		}
	}

	public static function escape($input) {
		echo htmlspecialchars($input,ENT_HTML5 | ENT_NOQUOTES,'UTF-8');
	}

	public static function raw($input) {
		echo $input;
	}
}

?>