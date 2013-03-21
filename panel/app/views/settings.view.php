<?php
	require 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('settings'); ?></h1>

<hr />

<form class="standard-form">
	<div class="input-control">
		<p class="input-label">Nom d'utilisateur :</p>
		<div class="input-field">
			<input type="text" name="username" value="<?= $app->Config->getKey('username'); ?>" pattern="[a-zA-Z0-9]+" required />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label">Mot de passe <span class="text-tip">(laisser vide si vous ne voulez pas le remplacer)</span> :</p>
		<div class="input-field">
			<input type="password" name="password" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label">Taille maximalle des médias :</p>
		<div class="input-field">
			<input type="text" name="maxMediaSize" pattern="[0-9]{1,}" value="<?= $app->Config->getKey(''); ?>" required />
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