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
	 * Gets the name of the element
	 * 
	 * @return string Name of the element
	 * @access public
	 * @deprecated
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Gets the content of the element
	 * 
	 * @return string Content of the element
	 * @access public
	 * @deprecated
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Gets the metadata of the element
	 * 
	 * @return string Metadata of the element
	 * @access public
	 * @deprecated
	 */
	public function getMetadata() {
		return $this->metadata;
	}

	/**
	 * Sets the name of the element
	 * 
	 * @param string $name Name of the element
	 * @access public
	 * @deprecated
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Sets the content of the element
	 * 
	 * @param string $content Content of the element
	 * @access public
	 * @deprecated
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * Sets the metadata of the element
	 * 
	 * @param array $metadata Metadata of the element
	 * @access public
	 * @deprecated
	 */
	public function setMetadata($metadata) {
		$this->metadata = $metadata;
	}

	public function hasAbility($ability) {
		if (is_string($ability) && in_array($ability,$this->metadata['abilities'])) {
			return true;
		} elseif (is_array($ability)) {
			foreach ($arbility as $item) {
				if (!in_array($item,$this->metadata['abilities'])) {
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