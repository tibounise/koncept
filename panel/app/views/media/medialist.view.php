<?php
    require 'assets/php/header.view.php';

	if ($itemcount == 0) {
?>
<h1><?= $app->Locales->getKey('mediaList'); ?></h1>

<hr />

<div class="center">
	<p><?= $app->Locales->getKey('noFilesOrFolderIn'); ?> <strong>/<?= $path; ?></strong></p>
	<br />
	<a href="media.php?action=upload&path=<?= $path; ?>"><button class="btn">Ajouter un fichier</button></a>
	<a href="media.php?action=addfolder&path=<?= $path; ?>"><button class="btn">Ajouter un dossier</button></a>
</div>
<?php
	} else {
?>
<h1 class="pull-left"><?= $app->Locales->getKey('mediaList'); ?></h1>

<a href="media.php?action=upload&path=<?= $path; ?>" class="pull-right"><button class="btn btn-mini">Ajouter un fichier</button></a>
<a href="media.php?action=addfolder&path=<?= $path; ?>" class="pull-right"><button class="btn btn-mini">Ajouter un dossier</button></a>

<hr />

<table class="listElements">
    <thead>
        <tr>
        	<th class="span5"></th>
            <th class="span5"></th>
            <th>Nom</th>
            <th class="span60">Poids</th>
        </tr>
    </thead>
    <tbody>
    	<?php
            foreach ($folders as $folder):
        ?>
        <tr>
            <td class="center"><a href="media.php?action=rmfolder&path=<?= $path.$folder; ?>" class="iconlink"><i class="icon-trash"></i></a></td>
            <td class="center"><i class="icon-folder-close iconlink"></i></td>
            <td><a href="media.php?action=list&path=<?= $path.$folder; ?>" class="pathlink"><?= htmlspecialchars($folder); ?></a></td>
            <td></td>
        </tr>
        <?php
            endforeach;
        ?>
        <?php
            foreach ($files as $file):
        ?>
        <tr>
            <td class="center"><a href="media.php?action=rmfile&path=<?= $path.$file; ?>" class="iconlink"><i class="icon-trash"></i></a></td>
            <td class="center"><i class="icon-file iconlink"></i></td>
            <td><a href="../media/<?= $path.$file; ?>" class="pathlink"><?= htmlspecialchars($file); ?></a></td>
            <td><?= \Kompakt\Helpers\Beautifier::Filesize(filesize($app->Mediatizer->getPath().$file)); ?></td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>
<?php
	}

    require 'assets/php/footer.view.php';
?>