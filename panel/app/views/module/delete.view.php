<?php
	$app->HtmlVars->setKey('title','module');
    require 'assets/php/header.view.php';
?>

<?php
	if (!$app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('confirmationRemoveModule'); ?></h1>
	
	<hr />
	
	<p><strong><?= $app->Locales->getKey('moduleName'); ?> : </strong><?= $module['identifier'] ?></p>
	<p><strong><?= $app->Locales->getKey('moduleVersion'); ?> : </strong><?= $module['version'] ?></p>
	
	<a href="processor.php?action=deletemodule&id=<?= $module['identifier']; ?>&token=<?= Kompakt\Handlers\User::getToken(); ?>"><button class="btn"><?= $app->Locales->getKey('yes'); ?></button></a>
	<a href="module.php?action=list&path=<?= $path; ?>"><button class="btn"><?= $app->Locales->getKey('no'); ?></button></a>
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