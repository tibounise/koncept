<?php
	$app->HtmlVars->setKey('title','element');
    require 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('newElement'); ?></h1>
<hr />

<?php
	$forme = new \Forme\Forme();
	$forme->action = 'processor.php?action=addelement';
	$forme->class = 'standard-form';

	// Element name field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementName';
	$field->label = $app->Locales->getKey('elementName');
	$forme->add($field);

	// Element pubdate field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementPubdate';
	$field->label = $app->Locales->getKey('elementCreationDate');
	$field->text_tip = $app->Locales->getKey('TIMESTAMPformat');
	$field->value = $timestamp;
	$forme->add($field);

	// Element pubdate field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementLastedit';
	$field->label = $app->Locales->getKey('elementLastUpdateDate');
	$field->text_tip = $app->Locales->getKey('TIMESTAMPformat');
	$field->value = $timestamp;
	$forme->add($field);

	// Abilities field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementAbilities';
	$field->label = $app->Locales->getKey('abilities');
	$forme->add($field);

	// Metadata field
	$field = new \Forme\Elements\Textarea();
	$field->name = 'elementMetadata';
	$field->label = $app->Locales->getKey('metadata');
	$field->text_tip = $app->Locales->getKey('JSONformat');
	$field->rows = 10;
	$field->value = $metadataJSON;
	$forme->add($field);

	// Content field
	$field = new \Forme\Elements\Textarea();
	$field->name = 'elementContent';
	$field->label = $app->Locales->getKey('elementContent');
	$field->text_tip = $app->Locales->getKey('HTMLformat');
	$field->id = 'content';
	$field->rows = 20;
	$forme->add($field);

	// Submit button
	$field = new \Forme\Elements\Submit();
	$field->value = $app->Locales->getKey('addElement');
	$field->class = 'btn';
	$forme->add($field);

	echo $forme->build();
?>

<script type="text/javascript" src="assets/js/codemirror/codemirror.js"></script>
<script type="text/javascript" src="assets/js/codemirror/xml.js"></script>
<script type="text/javascript" src="assets/js/codemirror/css.js"></script>
<script type="text/javascript" src="assets/js/codemirror/javascript.js"></script>
<script type="text/javascript" src="assets/js/codemirror/htmlmixed.js"></script>
<script type="text/javascript" src="assets/js/codemirror/bootleg.js"></script>

<?php
    require 'assets/php/footer.view.php';
?>