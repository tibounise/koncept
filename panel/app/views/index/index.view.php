<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>koncept:home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet/less" href="assets/css/home.less" />
        <link rel="stylesheet" href="assets/css/font-awesome.css" />
        <script src="assets/js/less/less-1.3.3.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="header-bar">
            <div class="logo">
                <a href="index.php"><img src="assets/images/koncept-logo.svg" height="35" width="185" /></a>            </div>
            <div class="icon-bar">
                <a href="settings.php" class="icon" title="<?= $app->Locales->getKey('settings'); ?>"><i class="icon-cogs"></i></a>
                <a href="backup.php" class="icon" title="<?= $app->Locales->getKey('backup'); ?>"><i class="icon-umbrella"></i></a>
                <a href="login.php?logout=true&token=<?= Kompakt\Handlers\User::getToken(); ?>" class="icon" title="<?= $app->Locales->getKey('logout'); ?>"><i class="icon-signout"></i></a>
            </div>
        </div>

        <div class="home-frame">
			<div class="flat-container">
				<a href="element.php?action=list"><div class="item"><i class="icon-file"></i></div></a>
				<a href="media.php?action=list"><div class="item"><i class="icon-camera"></i></div></a>
				<a href="router.php?action=list"><div class="item"><i class="icon-sitemap"></i></div></a>
				<a href="settings.php"><div class="item"><i class="icon-cogs"></i></div></a>
			</div>
		</div>
	</body>
</html>