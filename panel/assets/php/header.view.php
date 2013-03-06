<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>koncept:<?= $app->HtmlVars->getKey('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="assets/css/panel.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
    </head>
    <body>
        <div class="header-bar">
            <div class="logo">
                <img src="assets/images/koncept-logo.svg" height="35" width="185" />
            </div>
            <div class="icon-bar">
                <a href="#" class="icon" title="<?= $app->Locales->getKey('settings'); ?>"><i class="icon-cogs"></i></a>
                <a href="backup.php" class="icon" title="<?= $app->Locales->getKey('backup'); ?>"><i class="icon-umbrella"></i></a>
                <a href="login.php?logout=true&token=<?= Kompakt\Handlers\User::getToken(); ?>" class="icon" title="<?= $app->Locales->getKey('logout'); ?>"><i class="icon-signout"></i></a>
            </div>
        </div>

        <div class="menu">
            <div class="icon-bar">
                <a href="element.php?action=list" class="icon"><i class="icon-file"></i></a>
                <a href="media.php?action=list" class="icon"><i class="icon-camera-retro"></i></a>
            </div>
        </div>

        <div class="content-frame">