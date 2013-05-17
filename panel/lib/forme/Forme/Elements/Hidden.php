<?php

namespace Forme\Elements;

class Hidden {
	public $name;
	public $value;

	public function render()
	{
		return '<input type="hidden" name="'.$this->name.'" value="'.$this->value.'" />';
	}
}

?>