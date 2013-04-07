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
	<h1><?= $app->Locales->getKey('confirmationRemoveRoute'); ?></h1>

	<hr />

	<p><strong><?= $app->Locales->getKey('mask'); ?> : </strong><?= $route['regex']; ?></p>
	<p><strong><?= $app->Locales->getKey('controller'); ?> : </strong><?= $route['controller']; ?></p>
	<p><strong><?= $app->Locales->getKey('variables'); ?> : </strong><?= implode(' — ',$route['variables']); ?></p>

	<a href="processor.php?action=rmroute&id=<?= $_GET['id']; ?>&token=<?= \Kompakt\Handlers\User::getToken(); ?>"><button class="btn"><?= $app->Locales->getKey('yes'); ?></button></a>
	<a href="router.php?action=list"><button class="btn"><?= $app->Locales->getKey('no'); ?></button></a>
</div>
<?php
	}
?>