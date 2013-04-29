<?php
	$app->HtmlVars->setKey('title','module');
	require 'assets/php/header.view.php';

	if (count($moduleList) > 0)
	{
?>
<h1><?= $app->Locales->getKey('modulesList'); ?></h1>

<hr />

<?php
	}
	else
	{
?>
<h1><?= $app->Locales->getKey('modulesList'); ?></h1>

<hr />

<div class="center">
	<p><?= $app->Locales->getKey('noModule'); ?>.</p>
	<br />
	<a href="module.php?action=add"><button class="btn">Ajouter un module manuellement</button></a>
	<a href="pkg.php?action=list"><button class="btn">Ajouter un module via une source</button></a>
</div>

<?php
	} 
	require 'assets/php/footer.view.php';
?>