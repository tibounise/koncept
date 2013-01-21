<?php

class InterfaceBuilder {
	protected $title = '';
	protected $content = '';
	protected $head = '';

	public function setTitle($title) {
		$this->title = $title;
	}

	public function appendTitle($title) {
		$this->title .= $title;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	public function appendContent($content) {
		$this->content .= $content;
	}

	public function setHead($head) {
		$this->head = $head;
	}

	public function appendHead($head) {
		$this->head .= $head;
	}

	public function printLocalized(&$localization) {
		$interfaceHtml = file_get_contents('assets/html/template.html');
		$search = array('<String//Title>',
						'<String//Token>',
						'<Html//Content-Frame>',
						'<Html//Head>');
		$replace = array($this->title,
						 $_SESSION['token'],
						 $this->content,
						 $this->head);
		$interfaceRendered = str_replace($search,$replace,$interfaceHtml);
		echo $localization->ssParser($interfaceRendered);
	}
}

?>
