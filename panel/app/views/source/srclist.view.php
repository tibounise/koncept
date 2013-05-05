<?php
	$app->HtmlVars->setKey('title','source');
	require 'assets/php/header.view.php';
?>
<h1 class="pull-left"><?= $app->Locales->getKey('sourceList'); ?></h1>
<a href="source.php?action=addsource"><button class="btn btn-mini pull-right"><?= $app->Locales->getKey('addSource'); ?></button></a>

<hr />
<?php
	if (count($sources) > 0)
	{
?>
<table class="listElements">
	<thead>
		<tr>
			<th><?= $app->Locales->getKey('sourceUrl'); ?></th>
			<th><?= $app->Locales->getKey('identifier'); ?></th>
			<th class="center span25"></th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($sources as $key => $sourceInfos) {
		?>
		<tr>
			<td><?= $sourceInfos['url']; ?></td>
			<td><?= $sourceInfos['identifier']; ?></td>
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
<div class="center">
	<p><?= $app->Locales->getKey('noRegisteredSource'); ?></p>
</div>
<?php
	}
	require 'assets/php/footer.view.php';
?>