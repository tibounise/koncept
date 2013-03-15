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
<div class="center">
	<h1><?= $app->Locales->getKey('routeAdded'); ?></h1>
	<hr />
	<a href="router.php?action=list"><button class="btn"><?= $app->Locales->getKey('getBack'); ?></button></a>
</div>
<?php
	}
?>