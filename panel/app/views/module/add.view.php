<?php
	$app->HtmlVars->setKey('title','source');
	require 'assets/php/header.view.php';
?>
<h1><?= $app->Locales->getKey('addModule'); ?></h1>

<hr />

<form action="processor.php?action=addmodule" method="post" enctype="multipart/form-data" class="standard-form">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('moduleToUpload'); ?> :</p>
		<div class="input-field">
			<input type="file" name="moduleFile" />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('install'); ?>">
		</div>
	</div>
</form>

<?php
	require 'assets/php/footer.view.php';
?>