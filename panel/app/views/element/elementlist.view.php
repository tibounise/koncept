<?php
    require 'assets/php/header.view.php';

    if (count($index['files']) == 0) {
?>
<h1><?= $app->Locales->getKey('elementList'); ?></h1>

<hr />

<div class="center">
    <h2><?= $app->Locales->getKey('noElements'); ?></h2>
    <br />
    <a href="element.php?action=new"><button class="btn"><?= $app->Locales->getKey('newElement'); ?></button></a>
</div>

<?php
    } else {
?>

<h1 class="pull-left"><?= $app->Locales->getKey('elementList'); ?></h1> <a href="element.php?action=new"><button class="btn btn-mini pull-right"><?= $app->Locales->getKey('newElement'); ?></button></a>

<hr />

<table class="listElements">
    <thead>
        <tr>
            <th class="span5"></th>
            <th class="span5"></th>
            <th><?= $app->Locales->getKey('title'); ?></th>
            <th class="span60"><?= $app->Locales->getKey('id'); ?></th>
            <th class="span150"><?= $app->Locales->getKey('creationDate'); ?></th>
            <th class="span150"><?= $app->Locales->getKey('lastUpdate'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($index['files'] as $id => $file):
                $app->Fetcher->getElement($id);
        ?>
        <tr>
            <td><a href="element.php?action=remove&id=<?= $id; ?>" class="iconlink"><i class="icon-trash"></i></a></td>
            <td><a href="element.php?action=edit&id=<?= $id; ?>" class="iconlink"><i class="icon-pencil"></i></a></td>
            <td><?= htmlspecialchars(stripslashes($app->Fetcher->name)); ?></td>
            <td><?= $id; ?></td>
            <td><?= date($app->Locales->getKey('dateFormat'),$app->Fetcher->pubdate); ?></td>
            <td><?= date($app->Locales->getKey('dateFormat'),$app->Fetcher->lastedit); ?></td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>

<script src="assets/js/jquery/jquery.min.js"></script>

<?php
    }

    require 'assets/php/footer.view.php';
?>