<?php

namespace Kompakt\Handlers;

class Mediatizer {
	protected $path;
	protected $folderHandler;

	public function setPath($path) {
		if (substr($path, -1) != '/') {
			$path .= '/';
		}
		$this->path = $path;
		if (!is_dir($path)) {
			throw new \Exception('Folder not found');
		}
		$this->folderHandler = opendir($path);
		if (!$this->folderHandler) {
			echo 'ERROR ON READING FOLDER';
		}
	}

	public function getPath() {
		return $this->path;
	}

	public function listFiles() {
		rewinddir($this->folderHandler);
		$files = array();
		while ($file = readdir($this->folderHandler)) {
			if (is_file($this->path.$file)) {
				$files[] = $file;
			}
		}
		return $files;
	}

	public function listFolders() {
		rewinddir($this->folderHandler);
		$folders = array();
		while ($file = readdir($this->folderHandler)) {
			if (is_dir($this->path.$file)) {
				$folders[] = $file;
			}
		}
		return $folders;
	}

	public function cleanFiles($files) {
		$excluded = array('.htaccess','.DS_Store');
		return array_diff($files, $excluded);
	}

	public function cleanFolders($folders) {
		$excluded = array('.','..');
		return array_diff($folders, $excluded);
	}

	public static function rmdirplus($originalPath,$root = true) {
		$dirHandler = opendir($originalPath);
        while (($item = readdir($dirHandler)) !== false) {
            if($item != '.' && $item != '..') {
                $path = $originalPath.$item;
                if(is_dir($path.'/'))
                	self::rmdirplus($path.'/',false);
                else
                    unlink($path);
            }
        }
        closedir($dirHandler);
        rmdir($originalPath);
	}
}

?>