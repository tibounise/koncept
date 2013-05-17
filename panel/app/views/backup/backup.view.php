<?php
	require 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('Backup'); ?></h1>

<hr />

<?php
	$forme = new Forme\Forme();
	$forme->action = 'processor.php?action=backup';
	$forme->class = 'standard-form';

	// Enable media backup field
	$field = new Forme\Elements\Select();
	$field->options = array('true' => $app->Locales->getKey('yes'),
							'false' => $app->Locales->getKey('no'));
	$field->name = 'mediaBackup';
	$field->label = $app->Locales->getKey('enableMediaBackup');
	$forme->add($field);

	// Enable elements backup
	$field = new Forme\Elements\Select();
	$field->options = array('true' => $app->Locales->getKey('yes'),
							'false' => $app->Locales->getKey('no'));
	$field->name = 'elementBackup';
	$field->label = $app->Locales->getKey('enableElementBackup');
	$forme->add($field);

	// Submit field
	$field = new Forme\Elements\Submit();
	$field->class = 'btn';
	$field->value = $app->Locales->getKey('makeBackup');
?>

<form action="processor.php?action=backup" class="standard-form" method="POST">
	<h2><?= $app->Locales->getKey('mediaBackup'); ?></h2>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('enableMediaBackup'); ?> :</p>
		<div class="input-field">
			<?= $app->Locales->getKey('yes'); ?><input type="radio" name="mediaBackup" value="true" checked /> <?= $app->Locales->getKey('no'); ?><input type="radio" name="mediaBackup" value="false" />
		</div>
	</div>
	<h2>Sauvegarde des éléments</h2>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('enableElementBackup'); ?> :</p>
		<div class="input-field">
			<?= $app->Locales->getKey('yes'); ?><input type="radio" name="elementBackup" value="true" checked /> <?= $app->Locales->getKey('no'); ?><input type="radio" name="elementBackup" value="false" />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('makeBackup'); ?>" />	
		</div>
	</div>
</form>

<?php
	require 'assets/php/footer.view.php';
?>