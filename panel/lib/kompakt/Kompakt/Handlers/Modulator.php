<?php

namespace Kompakt\Handlers;

/**
 * @package Kompakt\Handlers
 */
class Modulator
{
	protected $modules = null;
	protected $indexpath = '../config/modules.json';

	public function loadModuleIndex()
	{
		$indexFile = file_get_contents($this->indexpath);

		if ($indexFile !== null)
		{
			$this->modules = json_decode($indexFile,true);
			return $this->modules !== null;
		}
		else
		{
			return false;
		}
	}

	public function getModuleList()
	{
		if ($indexFile !== null)
		{
			foreach ($this->modules as $module)
			{
				
			}
		}
	}
}

?>