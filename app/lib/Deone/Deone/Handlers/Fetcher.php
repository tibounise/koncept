<?php

namespace Deone\Handlers;

/**
 * A class to fetch elements.
 * 
 * @package Deone
 * @subpackage Handlers
 */
class Fetcher
{
	/**
	 * Path to the data folder
	 * @staticvar string Path to the data foler
	 */
	const PATH = 'data/';
	/**
	 * Name of the element
	 * @access public
	 * @var string Name of the element
	 */
	public $name;
	/**
	 * Content of the element
	 * @access public
	 * @var string Content of the element
	 */
	public $content;
	/**
	 * Metadatas of the element
	 * @access public
	 * @var array Metadatas of the elemnt
	 */
	public $metadata;
	/**
	 * Abilities of the element
	 * @access public
	 * @var array Abilities of the element
	 */
	public $abilities;
	/**
	 * Publication date of the element (timestamp)
	 * @access public
	 * @var integer Publication date of the element
	 */
	public $pubdate;
	/**
	 * Last edition of the element (timestamp)
	 * @access public
	 * @var integer Last edition of the element (timestamp)
	 */
	public $lastedit;

	/**
	 * Loads an element.
	 * @param integer $id ID of the element
	 * @return boolean Status of the execution of the function
	 * @access public
	 */
	public function loadElement($id)
	{
		$index = json_decode(file_get_contents(self::PATH.'index.json'),true);
		
		if ($index === null || !isset($index['files'][$id]))
		{
			return null;
		}
		else
		{
			$element = json_decode(file_get_contents(self::PATH.$index['files'][$id]),true);

			if ($element === null)
			{
				return null;
			}
			else
			{
				$this->name = $element['name'];
				$this->content = $element['content'];
				$this->metadata = $element['metadata'];
				$this->abilities = $element['abilities'];
				$this->pubdate = $element['pubdate'];
				$this->lastedit = $element['lastedit'];
				return true;
			}
		}
	}

	/**
	 * Generate an array with all the element's IDs.
	 * @return array List of the IDs
	 * @access public
	 */
	public function listElements() {
		$index = json_decode(file_get_contents(self::PATH.'index.json'),true);
		
		if ($index === null)
		{
			return null;
		}
		else
		{
			return array_keys($index['files']);
		}
	}

	/**
	 * Debug functions.
	 * 
	 * Erase all existing HTML codes, prints the content of the article. Then die().
	 */
	public function debug() {
		ob_clean();

		echo '<table border="1">';
		echo '<tr><td>Name</td><td>'.$this->name.'</td></tr>';
		echo '<tr><td>Content</td><td>'.htmlentities($this->content).'</td></tr>';
		echo '<tr><td>Metadata</td><td>';
		var_dump($this->metadata);
		echo '</td></tr>';
		echo '<tr><td>Abilities</td><td>';
		var_dump($this->abilities);
		echo '</td></tr>';
		echo '<tr><td>Pubdate</td><td>'.$this->pubdate.'</td></tr>';
		echo '<tr><td>Lastedit</td><td>'.$this->lastedit.'</td></tr>';
		echo '</table>';

		die();
	}
}

?>