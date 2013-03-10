<?php
    include 'assets/php/header.view.php';
?>

<h1><?= $app->Locales->getKey('elementList'); ?></h1>
<hr />

<?php
    if (count($index['files']) == 0) {
?>
<div class="center">
    <h2>Aucun article est actuellement enregistré.</h2>
    <br />
    <a href="element.php?action=new"><button class="btn"><?= $app->Locales->getKey('newElement'); ?></button></a>
</div>
<?php
    } else {
?>

<a href="element.php?action=new"><button class="btn"><?= $app->Locales->getKey('newElement'); ?></button></a>

<br />
<br />

<table class="listElements">
    <thead>
        <tr>
            <th class="span5"></th>
            <th class="span5"></th>
            <th><?= $app->Locales->getKey('elementName'); ?></th>
            <th class="span150"><?= $app->Locales->getKey('elementId'); ?></th>
            <th class="span200"><?= $app->Locales->getKey('elementCreationDate'); ?></th>
            <th class="span300"><?= $app->Locales->getKey('elementLastUpdateDate'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($index['files'] as $id => $file):
                $app->Fetcher->getElement($id);
                $metadata = $app->Fetcher->metadata;
        ?>
        <tr>
            <td><a href="element.php?action=remove&id=<?= $id; ?>" class="iconlink"><i class="icon-trash"></i></a></td>
            <td><a href="element.php?action=edit&id=<?= $id; ?>" class="iconlink"><i class="icon-pencil"></i></a></td>
            <td><?= htmlspecialchars(stripslashes($app->Fetcher->name)); ?></td>
            <td><?= $id; ?></td>
            <td><?= date($app->Locales->getKey('dateFormat'),$metadata['pubdate']); ?></td>
            <td><?= date($app->Locales->getKey('dateFormat'),$metadata['editdate']); ?></td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>
<?php
    }
?>

<?php
    include 'assets/php/footer.view.php';
?>