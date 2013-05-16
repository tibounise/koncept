<?php
    require 'assets/php/header.view.php';
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

<?php
	$forme = new Forme\Forme();
	$forme->action = 'processor.php?action=editelement&id='.$_GET['id'].'&token='.Kompakt\Handlers\User::getToken();
	$forme->class = 'standard-form';

	// Element name field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementName';
	$field->label = $app->Locales->getKey('elementName');
	$field->value = htmlspecialchars(stripslashes($app->Fetcher->name));
	$forme->add($field);

	// Element pubdate field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementPubdate';
	$field->label = $app->Locales->getKey('elementCreationDate');
	$field->text_tip = $app->Locales->getKey('TIMESTAMPformat');
	$field->value = $app->Fetcher->pubdate;
	$forme->add($field);

	// Element pubdate field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementLastedit';
	$field->label = $app->Locales->getKey('elementLastUpdateDate');
	$field->text_tip = $app->Locales->getKey('TIMESTAMPformat');
	$field->value = $app->Fetcher->lastedit;
	$forme->add($field);

	// Abilities field
	$field = new \Forme\Elements\TextInput();
	$field->name = 'elementAbilities';
	$field->label = $app->Locales->getKey('abilities');
	$field->value = $abilities;
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
	$field->value = htmlspecialchars(stripslashes($app->Fetcher->content));
	$forme->add($field);

	// Submit button
	$field = new \Forme\Elements\Submit();
	$field->value = $app->Locales->getKey('updateElement');
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
	}
?>

<?php
    require 'assets/php/footer.view.php';
?>