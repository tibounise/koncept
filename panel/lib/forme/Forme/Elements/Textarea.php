<?php

namespace Forme\Elements;

class Textarea {
	public $name;
	public $label;
	public $value;
	public $class;
	public $text_tip;
	public $placeholder;
	public $rows;
	public $id;

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
		$html .= '<textarea name="'.$this->name.'" id="'.$this->id.'" class="'.$this->class.'" placeholder="'.$this->placeholder.'">'.$this->value.'</textarea>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}

?>