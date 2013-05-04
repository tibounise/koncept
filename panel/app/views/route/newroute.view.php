<?php
	require 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('newRoute'); ?></h1>

<hr />

<form class="standard-form" method="POST" action="processor.php?action=newroute">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('routeRegex'); ?> <span class="text-tip">(<?= $app->Locales->getKey('routeRegexExplanation'); ?>)</span> :</p>
		<div class="input-field">
			<input type="text" name="routeRegex" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('controller'); ?> :</p>
		<div class="input-field">
			<input type="text" name="routeController" />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('createRoute'); ?>" />
		</div>
	</div>
</form>

<?php
	require 'assets/php/footer.view.php';
?>