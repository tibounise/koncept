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

	public function saveModuleIndex()
	{
		file_put_contents($this->indexpath,json_encode($this->modules));
	}

	public function extractModuleInfos($modulePath)
	{
		$zipHandler = new ZipArchive;
		if ($zipHandler->open($modulePath))
		{
			$moduleInfosRaw = $zipHandler->getFromName('module.json');
			
			if (!$moduleInfosRaw)
			{
				throw new \Exception('Can\'t open the informations file');
			}
			
			$zipHandler->close();

			return $moduleInfosRaw;
		}
		else
		{
			throw new \Exception('Unable to open the module\'s package');
		}
	}

	public function extractModuleData($modulePath)
	{
		$zipHandler = new ZipArchive;
		if ($zipHandler->open($modulePath))
		{
			$moduleInfosRaw = $zipHandler->getFromName('module.json');
			
			if (!$moduleInfosRaw)
			{
				throw new \Exception('Can\'t open the informations file');
			}
			
			$zipHandler->close();

			return $moduleInfosRaw;
		}
		else
		{
			throw new \Exception('Unable to open the module\'s package');
		}
	}

	public function registerModule($modName,$modFiles,$modVersion,$modIdentifier)
	{
		$this->modules['modList'][$modName] = array('version' => $modVersion,
													'files' => $modFiles,
													'identifier' => $modIdentifier);
		$this->modules['files'] = array_merge($modFiles,$this->modules['files']);

	}

	public function removeModule($modName)
	{
		// Deleting the module's files
		foreach ($this->modules['modList'][$modName]['files'] as $modFile)
		{
			unlink('../'.$modFile);
		}

		// Removing the files of the file index
		$this->modules['files'] = array_diff($this->modules['files'],$this->modules['modList'][$modName]['files']);

		// Removing the module entry to the modules index
		unset($this->modules['modList'][$modName]);
	}

	public function listModules()
	{
		return array_keys($this->modules['modList']);
	}
}

?>