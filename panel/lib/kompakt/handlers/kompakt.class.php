<?php

class Kompakt {
	public $User;
	public $Config;
	public $Fetcher;
	public $Error;
	public $Locales;
	public $HtmlVars;
	public $Mediatizer;

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
		if ($params & 16) { // ERROR parameter
			$this->Error =  new Kompakt\Handlers\Error;
		}
		if ($params & 32) { // LOCALIZED parameter
			$this->Locales = new Kompakt\Handlers\Fukon;
		}
		if ($params & 64) { // MEDIATIZER parameter
			$this->Mediatizer = new Kompakt\Handlers\Mediatizer;
		}
		$this->HtmlVars = new Kompakt\Handlers\Fukon;
	}

	public function configureLocales($localesPath) {
		$localesJSON = file_get_contents($localesPath);
		$this->Locales->pushJSON($localesJSON);
	}

	public function getToken() {
		return (!empty($_SESSION['token'])) ? $_SESSION['token'] : false;
	}
}

?>