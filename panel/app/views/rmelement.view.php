<?php
    include 'assets/php/header.view.php';
?>

<?php
	if (!$app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('confirmationRemoveArticle'); ?></h1>
	
	<hr />
	
	<p><strong><?= $app->Locales->getKey('elementName'); ?> : </strong><?= $app->Fetcher->getName(); ?></p>
	<p><strong><?= $app->Locales->getKey('elementId'); ?> : </strong><?= $_GET['id']; ?></p>
	
	<a href="processor.php?action=rmelement&id=<?= $_GET['id']; ?>&token=<?= $app->User->getToken(); ?>"><button class="btn"><?= $app->Locales->getKey('yes'); ?></button></a>
	<a href="element.php?action=list"><button class="btn"><?= $app->Locales->getKey('no'); ?></button></a>
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
    include 'assets/php/footer.view.php';
?>