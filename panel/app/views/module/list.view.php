<?php
	$app->HtmlVars->setKey('title','module');
	require 'assets/php/header.view.php';

	if (!!$moduleList && count($moduleList) > 0)
	{
?>
<h1 class="pull-left"><?= $app->Locales->getKey('modulesList'); ?></h1>
<a href="module.php?action=add"><button class="btn btn-mini pull-right">Ajouter un module manuellement</button></a>
<a href="source.php?action=pkglist"><button class="btn btn-mini pull-right">Ajouter un module via une source</button></a>

<hr />

<table class="listElements">
	<thead>
		<tr>
			<th><?= $app->Locales->getKey('name'); ?></th>
			<th><?= $app->Locales->getKey('identifier'); ?></th>
			<th><?= $app->Locales->getKey('version'); ?></th>
			<th></th>
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
				<a href="source.php?action=delete&id=<?= $key; ?>" class="iconlink"><i class="icon-trash"></i></a>
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
	<a href="module.php?action=add"><button class="btn">Ajouter un module manuellement</button></a>
	<a href="source.php?action=pkglist"><button class="btn">Ajouter un module via une source</button></a>
</div>

<?php
	} 
	require 'assets/php/footer.view.php';
?>