<?php
    require 'assets/php/header.view.php';
?>

<?php
	if ($app->Error->issetMessage()) {
?>
<h1><?= $app->Error->getMessage(); ?></h1>
<?php
	} else {
?>

<h1><?= $app->Locales->getKey('updateElement'); ?></h1>
<hr />

<form action="processor.php?action=editelement&id=<?= $_GET['id']; ?>&token=<?= Kompakt\Handlers\User::getToken(); ?>" class="standard-form" method="POST">
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementName'); ?> :</p>
		<div class="input-field">
			<input type="text" name="elementName" value="<?= htmlspecialchars(stripslashes($app->Fetcher->name)); ?>" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementCreationDate'); ?> <span class="text-tip">(<?= $app->Locales->getKey('TIMESTAMPformat'); ?>)</span> :</p>
		<div class="input-field">
			<input type="text" name="elementPubdate" value="<?= $app->Fetcher->pubdate; ?>" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementLastUpdateDate'); ?> <span class="text-tip">(<?= $app->Locales->getKey('TIMESTAMPformat'); ?>)</span> :</p>
		<div class="input-field">
			<input type="text" name="elementLastedit" value="<?= $app->Fetcher->lastedit; ?>" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('abilities'); ?> <span class="text-tip">(<?= $app->Locales->getKey('separateW/Commas'); ?>)</span> :</p>
		<div class="input-field">
			<input type="text" name="elementAbilities" value="<?= $abilities; ?>" />
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('metadata'); ?> <span class="text-tip">(<?= $app->Locales->getKey('JSONformat'); ?>)</span> :</p>
		<div class="input-field">
			<textarea rows="10" name="elementMetadata"><?= $metadataJSON; ?></textarea>
		</div>
	</div>
	<div class="input-control">
		<p class="input-label"><?= $app->Locales->getKey('elementContent'); ?> <span class="text-tip">(<?= $app->Locales->getKey('HTMLformat'); ?>)</span> :</p>
		<div class="input-field">
			<textarea rows="20" name="elementContent" id="content"><?= htmlspecialchars(stripslashes($app->Fetcher->content)); ?></textarea>
		</div>
	</div>
	<div class="input-control">
		<div class="input-field">
			<input type="submit" class="btn" value="<?= $app->Locales->getKey('updateElement'); ?>" />	
		</div>
	</div>
</form>

<script type="text/javascript" src="assets/js/codemirror/codemirror.js"></script>
<script type="text/javascript" src="assets/js/codemirror/xml.js"></script>
<script type="text/javascript" src="assets/js/codemirror/css.js"></script>
<script type="text/javascript" src="assets/js/codemirror/javascript.js"></script>
<script type="text/javascript" src="assets/js/codemirror/vbscript.js"></script>
<script type="text/javascript" src="assets/js/codemirror/htmlmixed.js"></script>
<script type="text/javascript" src="assets/js/codemirror/bootleg.js"></script>

<?php
	}
?>

<?php
    require 'assets/php/footer.view.php';
?>