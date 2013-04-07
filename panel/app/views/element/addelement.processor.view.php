<?php
    require 'assets/php/header.view.php';

    $app->HtmlVars->setKey('title','element');
?>

<?php
	if (!$app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('elementSuccessfullyAdded'); ?></h1>
	<br />
	<a href="element.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackElementList'); ?></button></a>
</div>
<?php
	} else {
?>
<div class="center">
	<h1><?= $app->Error->getMessage(); ?></h1>
	<br />
	<a href="element.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackElementList'); ?></button></a>
</div>
<?php
	}
?>

<?php
    require 'assets/php/footer.view.php';
?>