<?php
	include 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('Backup'); ?></h1>

<hr />

<form action="processor.php?action=returnbackup" class="standard-form">
	<h2>Sauvegarde des médias</h2>
	<div class="input-control">
		<div class="input-field">
			<p class="input-label">Activer la sauvegarde des média <input type="checkbox" /></p>
		</div>
	</div>
	<hr />
	<h2>Sauvegarde des éléments</h2>
	<div class="input-control">
		<div class="input-field">
			<p class="input-label">Activer la sauvegarde des éléments <input type="checkbox" /></p>
		</div>
	</div>
	<div class="input-control">
		<p class="input-label">Type de sauvegarde :</p>
		<div class="input-field">
			<select>
				<option>Combinée (1 fichier)</option>
				<option>Séparée (plusieurs fichiers)</option>
			</select>
		</div>
	</div>
</form>

<?php
	include 'assets/php/footer.view.php';
?>