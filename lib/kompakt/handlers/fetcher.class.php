<?php

namespace Kompakt\Handlers;

class Fetcher extends Elementy {
	private $name;
	private $content;
	private $metadata;
	private $path;

	public function registerPath($path) {
		$this->path = $path;
	}

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

	public function getName() {
		return $this->name;
	}

	public function getContent() {
		return $this->content;
	}

	public function getMetadata() {
		return $this->metadata;
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
}

?>