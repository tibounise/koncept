<?php
	$app->HtmlVars->setKey('title','module');
	require 'assets/php/header.view.php';
?>
<h1><?= $app->Locales->getKey(''); ?></h1>
<?php 
	require 'assets/php/footer.view.php';
?>