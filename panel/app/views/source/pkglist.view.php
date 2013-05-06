<?php
	$app->HtmlVars->setKey('title','source');
	require 'assets/php/header.view.php';
?>
<h1 class="pull-left"><?= $app->Locales->getKey('packageList'); ?></h1>
<a href="source.php?action=srclist"><button class="btn btn-mini pull-right"><?= $app->Locales->getKey('manageSources'); ?></button></a>

<hr />
<?php
	if (count($packages) > 0)
	{
?>
<table class="listElements">
	<thead>
		<tr>
			<th><?= $app->Locales->getKey('name'); ?></th>
			<th><?= $app->Locales->getKey('identifier'); ?></th>
			<th><?= $app->Locales->getKey('author'); ?></th>
			<th><?= $app->Locales->getKey('size'); ?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($packages as $package) {
		?>
		<tr>
			<td><?= $package['name']; ?></td>
			<td><?= $package['identifier']; ?></td>
			<td><?= $package['author']; ?></td>
			<td><?= \Kompakt\Helpers\Beautifier::Filesize($package['size']); ?></td>
			<td class="span25">
				<a href="source.php?action=install&id=<?= $package['identifier']; ?>&token=<?= Kompakt\Handlers\User::getToken(); ?>" class="iconlink"><i class="icon-cloud-download"></i></a>
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
<div class="center">
	<p><?= $app->Locales->getKey('noAvailablePackage'); ?></p>
</div>
<?php
	}
	require 'assets/php/footer.view.php';
?>