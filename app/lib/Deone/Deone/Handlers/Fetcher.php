<?php

namespace Deone\Handlers;

class Fetcher
{
	const PATH = 'data/';
	public $name;
	public $content;
	public $metadata;
	public $abilities;
	public $pubdate;
	public $lastedit;

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