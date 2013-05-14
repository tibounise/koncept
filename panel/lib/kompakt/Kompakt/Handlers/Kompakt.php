<?php

namespace Kompakt\Handlers;

/**
 * @package Kompakt
 */
class Kompakt
{
	public $User;
	public $Config;
	public $Fetcher;
	public $Error;
	public $Locales;
	public $HtmlVars;
	public $Mediatizer;
	public $Modulator;
	public $Sourcer;

	// Internal paths
	const configPath = '../config/admin.json';

	public function __construct()
	{
		session_start();
		session_regenerate_id();
	}

	public function configureApp($params)
	{
		$this->build($params);

		// Initialising some classes
		$this->HtmlVars = new \Kompakt\Handlers\Fukon;
		$this->Config = new \Kompakt\Handlers\Fukon;
		$this->Locales = new \Kompakt\Handlers\Fukon;

		$this->Config->pushJSON(file_get_contents(self::configPath));
		$this->Locales->pushJSON(file_get_contents('locales/'.$this->Config->getKey('language').'.json'));
	}

	public function build($params)
	{
		if ($params & 1) // USER_HANDLING parameter
		{
			$this->User = new \Kompakt\Handlers\User;
		}
		if ($params & 4) // FETCHER parameter
		{
			$this->Fetcher = new \Kompakt\Handlers\Fetcher;
		}
		if ($params & 8) // LOG_PROTECTION parameter
		{
			\Kompakt\Handlers\User::logProtection();
		}
		if ($params & 16) // ERROR parameter
		{
			$this->Error =  new \Kompakt\Handlers\Error;
		}
		if ($params & 64) // MEDIATIZER parameter
		{
			$this->Mediatizer = new \Kompakt\Handlers\Mediatizer;
		}
		if ($params & 128) // ROUTER parameter
		{
			$this->Router = new \Kompakt\Handlers\Router;
		}
		if ($params & 256) // MODULATOR parameter
		{
			$this->Modulator = new \Kompakt\Handlers\Modulator;
		}
		if ($params & 512) // SOURCER parameter
		{
			$this->Sourcer = new \Kompakt\Handlers\Sourcer;
		}
	}
}

?>