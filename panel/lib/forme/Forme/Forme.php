<?php

namespace Forme;

class Forme {
	private $fields;
	public $action = '';
	public $class = '';
	public $id = '';

	public function add($field)
	{
		$this->fields[] = $field;
	}

	public function build()
	{
		$html = '<form action="'.$this->action.'" class="'.$this->class.'" id="'.$this->id.'" method="POST">';

		foreach ($this->fields as $field) {
			$html .= $field->render();
		}

		$html .= '</form>';

		return $html;
	}
}

?>