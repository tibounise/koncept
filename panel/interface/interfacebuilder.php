<?php

class InterfaceBuilder {
	public static function buildStandardPage($content) {
		$head = file_get_contents('assets/html/panelhead.html');
		$footer = file_get_contents('assets/html/panelfooter.html');
		$search_array = array('<ID//Token>');
		$replace_array = array($_SESSION['token']);
		$raw_html = $head.$content.$footer;
		$processed_html = str_replace($search_array,$replace_array,$raw_html);
		return $processed_html;
	}
	public static function buildLoginPage() {
		global $locales;
		$raw_html = file_get_contents('assets/html/login.html');
		$search_array = array('<STRING//Username>',
							  '<STRING//Password>');
		$replace_array = array($locales->getStr('Username'),
							   $locales->getStr('Password'));
		$processed_html = str_replace($search_array,$replace_array,$raw_html);
		return $processed_html;
	}
	public static function build404Page() {
		global $locales;
		$raw_html = file_get_contents('assets/html/404.html');
		$search_array = array('<STRING//PageNotFound>');
		$replace_array = array($locales->getStr('PageNotFound'));
		$processed_html = str_replace($search_array,$replace_array,$raw_html);
		return $processed_html;
	}
}

?>