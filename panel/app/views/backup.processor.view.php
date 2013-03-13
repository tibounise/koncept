<?php

if (!$app->Error->issetMessage()) {
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=backup.zip');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($backupPath));
    readfile($backupPath);
    unlink($backupPath);
} else {
	require 'assets/php/header.view.php';
?>
<div class="center">
    <h1><?= $app->Error->getMessage(); ?></h1>
    <br />
    <a href="backup.php"><button class="btn"><?= $app->Locales->getKey('getBack'); ?></button></a>
</div>
<?php
    require 'assets/php/footer.view.php';
}

?>