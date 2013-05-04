<?php
	require 'assets/php/header.view.php';

	if ($app->Error->issetMessage()) {
?>
<div class="center">
	<h1><?= $app->Error->getMessage(); ?></h1>
	<hr />
	<a href="settings.php"><button class="btn"><?= $app->Locales->getKey('getBack'); ?></button></a>
</div>
<?php
	} else {
?>
<div class="center">
	<h1><?= $app->Locales->getKey('settingsUpdated'); ?></h1>
	<hr />
	<a href="settings.php"><button class="btn"><?= $app->Locales->getKey('getBack'); ?></button></a>
</div>
<?php
	}
	
	require 'assets/php/footer.view.php';
?>