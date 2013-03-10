<?php
    require 'assets/php/header.view.php';
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
		<p class="input-label"><?= $app->Locales->getKey('elementCreationDate'); ?> <span class="text-tip">(<?= $app->Locales->getKey('TIMESTAMPformat'); ?>)</span> :</p>
		<div class="input-field">
			<input type="text" name="elementPubdate" value="<?= $timestamp; ?>" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementLastUpdateDate'); ?> <span class="text-tip">(<?= $app->Locales->getKey('TIMESTAMPformat'); ?>)</span> :</p>
		<div class="input-field">
			<input type="text" name="elementLastedit" value="<?= $timestamp; ?>" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('abilities'); ?> :</p>
		<div class="input-field">
			<input type="text" name="elementAbilities" />
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
			<code><textarea rows="20" name="elementContent" id="content"></textarea></code>
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('addElement'); ?>" />	
		</div>
	</div>
</form>

<script type="text/javascript" src="assets/js/codemirror/codemirror.js"></script>
<script type="text/javascript" src="assets/js/codemirror/xml.js"></script>
<script type="text/javascript" src="assets/js/codemirror/css.js"></script>
<script type="text/javascript" src="assets/js/codemirror/javascript.js"></script>
<script type="text/javascript" src="assets/js/codemirror/vbscript.js"></script>
<script type="text/javascript" src="assets/js/codemirror/htmlmixed.js"></script>
<script type="text/javascript" src="assets/js/codemirror/bootleg.js"></script>

<?php
    require 'assets/php/footer.view.php';
?>