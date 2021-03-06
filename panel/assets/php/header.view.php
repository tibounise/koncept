<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>koncept:<?= $app->HtmlVars->getKey('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet/less" href="assets/css/panel.less" />
        <link rel="stylesheet" href="assets/css/font-awesome/font-awesome.min.css" />
        <script src="assets/js/less/less-1.3.3.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="header-bar">
            <div class="logo">
                <a href="index.php"><img src="assets/images/koncept-logo.svg" height="35" width="185" /></a>            </div>
            <div class="icon-bar">
                <a href="source.php?action=pkglist" title="<?= $app->Locales->getKey('packageManager'); ?>" class="icon"><i class="icon-truck"></i></a>
                <a href="settings.php" class="icon" title="<?= $app->Locales->getKey('settings'); ?>"><i class="icon-cogs"></i></a>
                <a href="backup.php" class="icon" title="<?= $app->Locales->getKey('backup'); ?>"><i class="icon-umbrella"></i></a>
                <a href="login.php?logout=true&token=<?= Kompakt\Handlers\User::getToken(); ?>" class="icon" title="<?= $app->Locales->getKey('logout'); ?>"><i class="icon-signout"></i></a>
            </div>
        </div>

        <div class="menu">
            <div class="icon-bar">
                <a href="element.php?action=list" class="icon"><i class="icon-file"></i></a>
                <a href="media.php?action=list" class="icon"><i class="icon-camera-retro"></i></a>
                <a href="router.php?action=list" class="icon"><i class="icon-sitemap"></i></a>
                <a href="module.php?action=list" class="icon"><i class="icon-lightbulb"></i></a>
            </div>
        </div>

        <div class="content-frame <?= ($app->HtmlVars->issetKey('frame-class')) ? $app->HtmlVars->getKey('frame-class') : null; ?>">