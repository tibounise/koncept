<?php
    include 'assets/php/header.view.php';
?>

<?php
	if (!$app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('confirmationRemoveFolder'); ?></h1>
	
	<hr />
	
	<p><strong><?= $app->Locales->getKey('folderPath'); ?> : </strong>/<?= $_GET['path'] ?></p>
	
	<a href="processor.php?action=rmfolder&path=<?= $_GET['path']; ?>&token=<?= $app->User->getToken(); ?>"><button class="btn"><?= $app->Locales->getKey('yes'); ?></button></a>
	<a href="media.php?action=list&path=<?= $path; ?>"><button class="btn"><?= $app->Locales->getKey('no'); ?></button></a>
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
    include 'assets/php/footer.view.php';
?>