<?php

namespace Forme\Elements;

class Submit {
	public $name;
	public $value;
	public $class;

	public function render()
	{
		$html = '<div class="input-control">';
		$html .= '<div class="input-field">';
		$html .= '<input type="submit" name="'.$this->name.'" value="'.$this->value.'" class="'.$this->class.'" />';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}

?>