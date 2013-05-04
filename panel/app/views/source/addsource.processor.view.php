<?php
	$app->HtmlVars->setKey('title','source');
	require 'assets/php/header.view.php';
?>
<h1><?= $app->Locales->getKey('addSource'); ?></h1>

<hr />

<div class="center">
	<h3>
<?php
	if ($app->Error->issetMessage())
	{
		echo $app->Error->getMessage();
	}
	else
	{
		echo $app->Locales->getKey('sourceAdded');
	}
?>
	</h3>
</div>
<?php
	require 'assets/php/footer.view.php';
?>