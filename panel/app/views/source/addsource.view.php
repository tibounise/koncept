<?php
	$app->HtmlVars->setKey('title','source');
	require 'assets/php/header.view.php';
?>
<h1><?= $app->Locales->getKey('addSource'); ?></h1>

<hr />

<form class="standard-form" method="POST" action="processor.php?action=addsource">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('sourceUrl'); ?> :</p>
		<div class="input-field">
			<input type="text" name="sourceUrl" />
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('addTheSource'); ?>" />
		</div>
	</div>
</form>
<?php
	require 'assets/php/footer.view.php';
?>