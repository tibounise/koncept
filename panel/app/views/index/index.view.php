<?php
	$app->HtmlVars->setKey('title','home');
    require 'assets/php/header.view.php';
?>

<h1>Welcome to koncept !</h1>
<p>Version de PHP : <?= phpversion(); ?></p>
<p>Include path : <?= get_include_path(); ?></p>
<p>Fichier requis : <?php var_dump(get_required_files()); ?></p>

<?php
    require 'assets/php/footer.view.php';
?>