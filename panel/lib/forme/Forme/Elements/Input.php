<?php

namespace Forme/Elements;

class Input {
	private $name;
	private $label;

	public function render()
	{
		$html = '<div class="input-control">';
		$html .= '<p class="input-label">'.$this->.' :</p>'
		$html .= '</div>';
		return html;
	}
}

?>