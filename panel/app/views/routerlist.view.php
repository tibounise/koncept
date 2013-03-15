<?php
	require 'assets/php/header.view.php';
?>

<h1 class="pull-left"><?= $app->Locales->getKey('router'); ?></h1>
<a href="router.php?action=new"><button class="btn btn-mini pull-right"><?= $app->Locales->getKey('newRoute'); ?></button></a>

<hr />

<?php
	if ($showRoutes) {
?>

<table class="listElements">
	<thead>
		<tr>
			<th><?= $app->Locales->getKey('mask'); ?></th>
			<th><?= $app->Locales->getKey('controller'); ?></th>
			<th><?= $app->Locales->getKey('variables'); ?></th>
			<th><?= $app->Locales->getKey('actions'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($routes as $key => $route) {
		?>
		<tr>
			<td><span class="highlight code"><?= $route->regex; ?></span></td>
			<td><?= $route->controller; ?></td>
			<td><?= implode(' / ',$route->variables); ?></td>
			<td>
				<a href="router.php?action=delete&id=<?= $key; ?>" class="iconlink"><i class="icon-trash"></i></a>
				&nbsp;
				<a href="router.php?action=edit&id=<?= $key; ?>" class="iconlink"><i class="icon-edit"></i></a>
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>

<?php
	} else {
?>
<div class="center">
	<h3><?= $app->Locales->getKey('noDefinedRoutes'); ?></h3>
</div>
<?php
	}

	require 'assets/php/footer.view.php';
?>