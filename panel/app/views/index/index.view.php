<?php
	$app->HtmlVars->setKey('title','home');
	$app->HtmlVars->setKey('frame-class','blueprint');
    require 'assets/php/header.view.php';
?>

<div class="info-container">
	<h1 class="center"><?= $app->Locales->getKey('welcome'); ?></h1>
	<p>Version de PHP : <?= phpversion(); ?></p>
	<p>Include path : <?= get_include_path(); ?></p>
	<p>Fichier requis : <?= count(get_required_files()); ?></p>
</div>

<?php
    require 'assets/php/footer.view.php';
?>