<?php

namespace Forme\Elements;

class TextInput {
	public $name;
	public $label;
	public $value;
	public $class;
	public $text_tip;
	public $placeholder;

	public function render()
	{
		$html = '<div class="input-control">';
		if (empty($this->text_tip))
		{
			$html .= '<p class="input-label">'.$this->label.' :</p>';
		}
		else
		{
			$html .= '<p class="input-label">'.$this->label.' <span class="text-tip">('.$this->text_tip.')</span> :</p>';
		}
		$html .= '<div class="input-field">';
		$html .= '<input type="text" name="'.$this->name.'" value="'.$this->value.'" class="'.$this->class.'" placeholder="'.$this->placeholder.'" />';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}

?>