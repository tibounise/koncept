<?php
	$app->HtmlVars->setKey('title','module');
	require 'assets/php/header.view.php';

	if (!!$moduleList && count($moduleList) > 0)
	{
?>
<h1 class="pull-left"><?= $app->Locales->getKey('modulesList'); ?></h1>
<a href="module.php?action=add"><button class="btn btn-mini pull-right"><?= $app->Locales->getKey('addManually'); ?></button></a>
<a href="source.php?action=pkglist"><button class="btn btn-mini pull-right"><?= $app->Locales->getKey('addViaSource'); ?></button></a>

<hr />

<table class="listElements">
	<thead>
		<tr>
			<th><?= $app->Locales->getKey('name'); ?></th>
			<th><?= $app->Locales->getKey('identifier'); ?></th>
			<th><?= $app->Locales->getKey('version'); ?></th>
			<th class="center span25"></th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($moduleList as $moduleName => $module)
			{
		?>
		<tr>
			<td><?= $moduleName; ?></td>
			<td><?= $module['identifier']; ?></td>
			<td><?= $module['version']; ?></td>
			<td>
				<a href="module.php?action=delete&id=<?= $module['identifier']; ?>" class="iconlink"><i class="icon-trash"></i></a>
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
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
	<a href="module.php?action=add"><button class="btn"><?= $app->Locales->getKey('addManually'); ?></button></a>
	<a href="source.php?action=pkglist"><button class="btn"><?= $app->Locales->getKey('addViaSource'); ?></button></a>
</div>

<?php
	} 
	require 'assets/php/footer.view.php';
?>