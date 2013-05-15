<?php

namespace Forme;

class Forme {
	private $fields;

	public function add($field)
	{
		$this->fields[] = $field;
	}

	public function render($action = '',$method = 'POST',$class = '',$id = '')
	{
		// BEGIN FORM HTML

		foreach ($this->fields as $field) {
			$html .= $field->render();
		}

		// END FORM HTML
	}
}

?>