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

	public function install($modulePath)
	{
		$zipHandler = new \ZipArchive;
		if ($zipHandler->open($modulePath))
		{
			$moduleInfosRaw = $zipHandler->getFromName('module.json');
			
			if (!$moduleInfosRaw)
			{
				throw new \Exception('Can\'t open the informations file');
			}
			
			$moduleInfos = json_decode($moduleInfosRaw,true);

			if ($moduleInfos === null)
			{
				throw new \Exception('Can\'t open the informations file');
			}

			if ($this->isModuleInstalled($moduleInfos['name'])) // Checking if there isn't another module with the same name
			{
				throw new \Exception('Module already installed');
			}
			elseif ($this->checkFileCollisions($moduleInfos['files'])) // Checking if there isn't another module using the same files
			{
				throw new \Exception('Collision with existing files');
			}

			// Copyring the data archive to tmp directory
			$zipHandler->extractTo('tmp/','data.zip');
			$zipHandler->close();

			$zipHandler = new \ZipArchive;
			if (!$zipHandler->open('tmp/data.zip'))
			{
				throw new \Exception('Can\'t open the data archive');
			}

      		// Copying theses files to the root folder
      		if (!$zipHandler->extractTo('../'))
      		{
      			throw new \Exception('Can\'t extract the files');
      		}

      		$zipHandler->close();

			// Registering the module into the database
			$this->registerModule($moduleInfos['name'],$moduleInfos['files'],$moduleInfos['version'],$moduleInfos['identifier']);
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

	public function checkFileCollisions($modFiles)
	{
		foreach ($modFiles as $modFile)
		{
			if (in_array($modFile,$this->modules['files'])) {
				return true;
			}
		}

		return false;
	}

	public function isModuleInstalled($modName)
	{
		return isset($this->modules['modList'][$modName]);
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
		if (!isset($this->modules['modList']))
		{
			return false;
		}
		return array_keys($this->modules['modList']);
	}

	public function fullListModules()
	{
		if (!isset($this->modules['modList']))
		{
			return false;
		}
		return $this->modules['modList'];
	}
}

?>