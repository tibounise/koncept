<?php
	$app->HtmlVars->setKey('title','error');
    require 'assets/php/header.view.php';
?>

<h1 class="center"><?= $app->Locales->getKey('noActionProvided'); ?></h1>

<?php
    require 'assets/php/footer.view.php';
?>