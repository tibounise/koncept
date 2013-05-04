<?php
	require 'assets/php/header.view.php';

	if ($app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Error->getMessage(); ?></h1>
	<hr />
	<a href="router.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBack'); ?></button></a>
</div>
<?php
	} else {
?>

<h1><?= $app->Locales->getKey('editRoute'); ?></h1>

<hr />

<form class="standard-form" method="POST" action="processor.php?action=editroute&id=<?= $_GET['id']; ?>">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('routeRegex'); ?> <span class="text-tip">(<?= $app->Locales->getKey('routeRegexExplanation'); ?>)</span> :</p>
		<div class="input-field">
			<input type="text" name="routeRegex" value="<?= $route['regex']; ?>" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('controller'); ?> :</p>
		<div class="input-field">
			<input type="text" name="routeController" value="<?= $route['controller']; ?>" />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('updateRoute'); ?>" />
		</div>
	</div>
</form>

<?php
	}

	require 'assets/php/footer.view.php';
?>