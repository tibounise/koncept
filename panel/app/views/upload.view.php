<?php
    include 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('uploadMedia'); ?></h1>

<hr />

<form action="processor.php?action=uploadmedia" method="post" enctype="multipart/form-data" class="standard-form">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?= $app->Config->getKey('uploadMax')*pow(1024,2); ?>">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('fileToUpload'); ?> <span class="text-tip">(<?= $app->Locales->getKey('limitedTo'); ?> <?= $app->Config->getKey('uploadMax'); ?> Mo)</span> :</p>
		<div class="input-field">
			<input type="file" name="mediaFile" />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('upload'); ?>">
		</div>
	</div>
</form>

<?php
    include 'assets/php/footer.view.php';
?>