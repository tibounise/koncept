<?php
	$app->HtmlVars->setKey('title','module');
    require 'assets/php/header.view.php';
?>

<?php
	if (!$app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('removeModule'); ?></h1>
	
	<hr />
	
	<h3><?= $app->Locales->getKey('moduleRemoved'); ?></h3>
	
	<a href="module.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackModuleList'); ?></button></a>
</div>
<?php
	} else {
?>
<div class="center">
	<h1><?= $app->Error->getMessage(); ?></h1>
	<br />
	<a href="module.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackModuleList'); ?></button></a>
</div>
<?php
	}
?>

<?php
    require 'assets/php/footer.view.php';
?>