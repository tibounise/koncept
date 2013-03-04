<?php
    include 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('newElement'); ?></h1>
<hr />

<form action="processor.php?action=addelement" class="standard-form" method="POST">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementName'); ?> :</p>
		<div class="input-field">
			<input type="text" name="elementName" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('metadata'); ?> <span class="text-tip">(<?= $app->Locales->getKey('JSONformat'); ?>)</span> :</p>
		<div class="input-field">
			<textarea rows="10" name="elementMetadata"><?= $metadataJSON; ?></textarea>
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementContent'); ?> <span class="text-tip">(<?= $app->Locales->getKey('HTMLformat'); ?>)</span> :</p>
		<div class="input-field">
			<textarea rows="20" name="elementContent"></textarea>
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('addElement'); ?>" />	
		</div>
	</div>
</form>

<?php
    include 'assets/php/footer.view.php';
?>