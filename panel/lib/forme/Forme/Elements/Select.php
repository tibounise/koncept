<?php

namespace Forme\Elements;

class Select {
	public $name;
	public $options;
	public $label;
	public $text_tip;

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
		$html .= '<select name="'.$this->name.'">';
		foreach ($this->options as $value => $option) {
			$html .= '<option value="'.$value.'">'.$option.'</option>';
		}
		$html .= '</select>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}

?>