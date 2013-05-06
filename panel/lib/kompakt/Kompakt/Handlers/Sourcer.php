<?php

namespace Kompakt\Handlers;

/**
 * @package Kompakt\Handlers
 */
class Sourcer
{
	protected $sources = null;
	protected $indexpath = '../config/sources.json';

	public function loadSourceIndex()
	{
		$indexFile = file_get_contents($this->indexpath);

		if ($indexFile !== null)
		{
			$this->sources = json_decode($indexFile,true);
			return $this->sources !== null;
		}
		else
		{
			return false;
		}
	}

	public function saveSourceIndex()
	{
		if (file_put_contents($this->indexpath,json_encode($this->sources)) === false)
		{
			throw new \Exception('Unable to write to the source file');
		}
	}

	public function listPackages()
	{
		$packages = array();
		foreach ($this->sources as $source)
		{
			$curlHandler = curl_init($source['url'].'/pkgs.json');
			curl_setopt($curlHandler,CURLOPT_HEADER,false);
			curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
			$packagesResult = json_decode(curl_exec($curlHandler),true);
			curl_close($curlHandler);

			if ($packagesResult === null)
			{
				throw new \Exception('Unable to download from : '.$source['url']);
			}

			$packages = array_merge($packages,$packagesResult);
		}

		return $packages;
	}

	public function addSource($url)
	{
		$curlHandler = curl_init($url.'/info.json');
		curl_setopt($curlHandler,CURLOPT_HEADER,false);
		curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
		$sourceInfo = json_decode(curl_exec($curlHandler),true);
		curl_close($curlHandler);

		if ($sourceInfo !== null)
		{
			if ($this->issetSourceByID($sourceInfo['identifier']))
			{
				throw new \Exception('Another source with the same identifier has already been added');
			}
			$this->sources[] = array('identifier' => $sourceInfo['identifier'],'url' => $url);
		}
		else
		{
			throw new \Exception('Error while fetching the source informations');
		}
	}

	public function deleteSource($id)
	{
		unset($this->sources[$id]);
	}

	public function listSources()
	{
		return $this->sources;
	}

	public function issetSourceByUrl($url)
	{
		if (count($this->sources) == 0)
		{
			return false;
		}

		foreach ($this->sources as $source)
		{
			if ($source['url'] == $url)
			{
				return true;
			}
		}
		return false;
	}

	public function issetSourceByID($identifier)
	{
		if (count($this->sources) == 0)
		{
			return false;
		}

		foreach ($this->sources as $source)
		{
			if ($source['identifier'] == $identifier)
			{
				return true;
			}
		}
		return false;
	}

	public function issetSourceByIndex($index)
	{
		return isset($this->sources[$index]);
	}

	public function issetPackageByID($identifier)
	{
		$packages = $this->listPackages();

		foreach ($packages as $package) {
			if ($package['identifier'] == $identifier)
			{
				return true;
			}
		}

		return false;
	}

	public function downloadPackage($identifier)
	{
		$packages = $this->listPackages();

		foreach ($packages as $package) {
			if ($package['identifier'] == $identifier)
			{
				// Downloading our package to tmp/package.kcpt with CURL
				$fileHandler = fopen('tmp/package.kcpt','w'); 
				$curlHandler = curl_init($package['url']);
				
				curl_setopt($curlHandler,CURLOPT_FILE,$fileHandler);
				curl_setopt($curlHandler,CURLOPT_USERAGENT,'Koncept Sourcer Agent');

				// Closing everything
				curl_exec($curlHandler);

				$httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
				if($httpCode == 404)
				{
					curl_close($curlHandler);
					fclose($fileHandler);
					unlink('tmp/package.kcpt');
					throw new \Exception('404 Error');
				}

				curl_close($curlHandler);
				fclose($fileHandler);

				// Checking MD5
				if (md5_file('tmp/package.kcpt') != $package['md5'])
				{
					throw new \Exception('MD5 fail');
				}

				return true;
			}
		}
		return false;
	}
}

?>