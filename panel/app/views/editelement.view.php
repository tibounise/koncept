<?php
    include 'assets/php/header.view.php';
?>

<?php
	if ($app->Error->issetMessage()) {
?>
<h1><?= $app->Error->getMessage(); ?></h1>
<?php
	} else {
?>

<h1><?= $app->Locales->getKey('updateElement'); ?></h1>
<hr />

<form action="processor.php?action=editelement&id=<?= $_GET['id']; ?>&token=<?= Kompakt\Handlers\User::getToken(); ?>" class="standard-form" method="POST">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementName'); ?> :</p>
		<div class="input-field">
			<input type="text" name="elementName" value="<?= htmlspecialchars(stripslashes($app->Fetcher->name)); ?>" />
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
			<textarea rows="20" name="elementContent"><?= htmlspecialchars(stripslashes($app->Fetcher->content)); ?></textarea>
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('updateElement'); ?>" />	
		</div>
	</div>
</form>

<?php
	}
?>

<?php
    include 'assets/php/footer.view.php';
?>