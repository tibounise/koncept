<?php
    include 'assets/php/header.view.php';
?>

<?php
	if (!$app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('folderSuccessfullyDeleted'); ?></h1>
	<br />
	<a href="media.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackMediaList'); ?></button></a>
</div>
<?php
	} else {
?>
<div class="center">
	<h1><?= $app->Error->getMessage(); ?></h1>
	<br />
	<a href="media.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackMediaList'); ?></button></a>
</div>
<?php
	}
?>

<?php
    include 'assets/php/footer.view.php';
?>