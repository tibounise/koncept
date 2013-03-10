<?php

namespace Kompakt\Handlers;

class Fetcher extends Elementy {
	/**
	 * Name of the element
	 * 
	 * @var string $name Name of the element
	 * @access public
	 */
	public $name;

	/**
	 * Content of the element
	 * 
	 * @var string $content Content of the element
	 * @access public
	 */
	public $content;

	/**
	 * Metadata of the element
	 * 
	 * @var array $metadata Metadata of the element
	 * @access public
	 */
	public $metadata;

	/**
	 * Path to the element
	 * 
	 * @var string $path Path to the element
	 * @access public
	 */
	public $path;

	/**
	 * Initial publication date of the element
	 * 
	 * @var int $pubdate Initial publication date of the element
	 * @access public
	 */
	public $pubdate;

	/**
	 * Date of the last modification of the element
	 * 
	 * @var int $lastedit Latest modification of the element
	 * @access public
	 */
	public $lastedit;

	/**
	 * Abilities of the element
	 * 
	 * @var array $abilities Abilities of the element
	 * @access public
	 */
	public $abilities;

	public function hasAbility($ability) {
		if (is_string($ability) && in_array($ability,$this->abilities)) {
			return true;
		} elseif (is_array($ability)) {
			foreach ($arbility as $item) {
				if (!in_array($item,$this->abilities)) {
					return false;
				}
			}
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Registers the path to get the article
	 * 
	 * @param string $path Path to the /data folder
	 * @access public
	 */
	public function registerPath($path) {
		$this->path = $path;
	}

	/**
	 * Fetches an element from the index, and gets its data associated with
	 * 
	 * @param int $id ID of the article
	 * @access public
	 */
	public function getElement($id) {
		if (isset($this->index['files'][$id])) {
			$element = json_decode(file_get_contents($this->path.$this->index['files'][$id]),true);
			if ($element !== null) {
				$this->name = $element['name'];
				$this->content = $element['content'];
				$this->metadata = $element['metadata'];
				$this->abilities = $element['abilities'];
				$this->pubdate = $element['pubdate'];
				$this->lastedit = $element['lastedit'];
				return true;
			}
			else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * Saves the elements to his file
	 * 
	 * @param int $id ID of the element
	 * @access public
	 */
	public function saveElement($id) {
		$element['name'] = $this->name;
		$element['content'] = $this->content;
		$element['metadata'] = $this->metadata;
		$element['abilities'] = $this->abilities;
		$element['pubdate'] = $this->pubdate;
		$element['lastedit'] = $this->lastedit;
		return file_put_contents($this->path.'element-'.$id.'.json',json_encode($element),LOCK_EX);
	}

	/**
	 * Deletes an element (its file and its index record)
	 * 
	 * @param int $id ID of the element
	 * @return bool Result of the operation
	 * @access public
	 */
	public function deleteElement($id) {
		$pathToElement = $this->path.'/element-'.$id.'.json';
		if (is_writable($pathToElement)) {
			unlink($pathToElement);
			$this->rmIndex($id);
			$this->saveIndex();
			return true;
		} else {
			return false;
		}
	}
}

?>