<?php

namespace Kompakt\Handlers;

/**
 * @package Kompakt\Handlers
 */
class Modulator
{
	protected $sources = null;
	protected $indexpath = '../config/sources.json';

	public function loadSourceIndex()
	{
		$indexFile = file_get_contents($this->indexpath);

		if ($indexFile !== null)
		{
			$this->source = json_decode($indexFile,true);
			return $this->source !== null;
		}
		else
		{
			return false;
		}
	}

	public function saveSourceIndex()
	{
		file_put_contents($this->indexpath,json_encode($this->source));
	}

	public function listPackages()
	{
		$packages = array();
		foreach ($this->sources as $source)
		{
			$curlHandler = curl_init($source.'/pkgs.json');
			curl_setopt($curlHandler,CURLOPT_HEADER,0);
			curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,0);
			$packagesResult = json_decode(curl_exec($curlHandler),true);
			curl_close($curlHandler);

			if ($packagesResult === null)
			{
				throw new \Exception('Unable to download from : '.$source);
			}

			$packages = array_merge($packages,$packagesResult);
		}

		return $packages;
	}

	public function addSource($url)
	{
		$curlHandler($source.'/info.json');
		curl_setopt($curlHandler,CURLOPT_HEADER,0);
		curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,0);
		$sourceInfo = json_decode(curl_exec($curlHandler),true);
		curl_close($curlHandler);

		if ($sourceInfo !== null)
		{
			$this->sources[] = array('identifier' => $sourceInfo['identifier'],'url' => $url);
		}
		else
		{
			throw new \Exception('Error while fetching the source informations');
		}
	}

	public function listSources()
	{
		return $this->sources;
	}
}

?>