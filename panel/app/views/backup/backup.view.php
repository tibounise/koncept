<?php
	$app->HtmlVars->setKey('title','backup');
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
	$forme->add($field);

	echo $forme->build();
?>

<?php
	require 'assets/php/footer.view.php';
?>