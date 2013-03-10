<?php
	require 'assets/php/header.view.php';
?>

<?php
	if (!$app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('fileUploaded'); ?></h1>
	<br />
	<a href="media.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackFolderList'); ?></button></a>
</div>
<?php
	} else {
?>
<div class="center">
	<h1><?= $app->Error->getMessage(); ?>.</h1>
	<br />
	<a href="media.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBackFolderList'); ?></button></a>
</div>
<?php
	}
?>

<?php
	require 'assets/php/footer.view.php';
?>