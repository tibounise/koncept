<?php
	$app->HtmlVars->setKey('title','settings');
	require 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('settings'); ?></h1>

<hr />

<form class="standard-form" method="POST" action="processor.php?action=updatesettings">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('username'); ?> :</p>
		<div class="input-field">
			<input type="text" name="username" value="<?= $app->Config->getKey('username'); ?>" pattern="[a-zA-Z0-9]+" required />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('password'); ?> <span class="text-tip">(<?= $app->Locales->getKey('leaveEmpty'); ?>)</span> :</p>
		<div class="input-field">
			<input type="password" name="password" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('maxMediaSize'); ?> :</p>
		<div class="input-field">
			<input type="text" name="maxMediaSize" pattern="[0-9]{1,}" value="<?= $app->Config->getKey('uploadMax'); ?>" required />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('updateSettings'); ?>" />
		</div>
	</div>
</form>

<?php
	require 'assets/php/footer.view.php';
?>