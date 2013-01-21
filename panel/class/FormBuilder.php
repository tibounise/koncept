<?php

namespace FormBuilder {
	class Form {
		protected $elements,$attributes;

		public function __construct($attributes) {
			$this->attributes = $attributes;
		}

		public function addElement($object) {
			$this->elements[] = $object;
		}

		public function buildForm() {
			$code = '';
			foreach ($this->attributes as $attr_title => $attr_value) {
				$code .= $attr_title.'="'.$attr_value.'" ';
			}
			$code = rtrim($code);
			$html = '<form '.$code.' >';
			foreach ($elements as $element) {
				$html .= $element->build();
			}
			$html .= '</form>'
			return $html;
		}
	}

	class Input {
		protected $attributes,$caption,$tooltip;

		public function __construct($attributes,$caption,$tooltip = '') {
			$this->attributes = $attributes;
		}

		public function build() {
			if (!empty($this->tooltip)) {
				$html = '<div class="input-control"><p class="input-label">'.$this->caption.' <span class="text-tip">'.$this->tooltip.'</span> :</p><div class="input-field">';
			} else {
				$html = '<div class="input-control"><p class="input-label">'.$this->caption.' :</p><div class="input-field">';
			}
			$code = '';
			foreach ($this->attributes as $attr_title => $attr_value) {
				$code .= $attr_title.'="'.$attr_value.'" ';
			}
			$code = rtrim($code);
			$code = '<input '.$code.' />';
			$html .= $code;
			$html .= '</div></div>'
			return $code;
		}
	}

	class Textarea {
		protected $attributes,$default_value;

		public function __construct($attributes,$default_value = '') {
			$this->attributes = $attributes;
			$this->default_value = $default_value;
		}

		public function build() {
			$attributes = '';
			foreach ($this->attributes as $attr_title => $attr_value) {
				$code .= $attr_title.'="'.$attr_value.'" ';
			}
			$attributes = rtrim($attributes);
			$html = '<textarea '.$attributes.'>';
			$html .= $this->default_value;
			$html .= '</textarea>';
		}
	}
}

?>