<?php
    include 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('createAFolder'); ?></h1>

<hr />

<form action="processor.php?action=addfolder&token=<?= \Kompakt\Handlers\User::getToken(); ?>&path=<?= $path; ?>" method="post" class="standard-form">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('folderName'); ?> :</p>
		<div class="input-field">
			<input type="text" name="folderName" />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('createFolder'); ?>">
		</div>
	</div>
</form>

<?php
    include 'assets/php/footer.view.php';
?>