<!doctype html>
<html lang="en">
    <head>
	<title>koncept:login</title>
        <meta name="viewport" content="width=device-width" />
        <meta charset="utf-8" />
        <link rel="stylesheet" href="assets/css/login.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.css" />
    </head>
    <body>
	<div class="login-box">
	    <img src="assets/images/koncept-logo.svg" alt="koncept logo" height="63" width="333" />
	    
	    <hr />

	    <?php
	    	if ($app->Error->issetMessage()) {
	    ?>
	    <p class="pink"><?= $app->Error->getMessage(); ?></p>
	    <br />
	    <?php
	    	}
	    ?>
	    
	    <form action="login.php" method="POST">
			<input type="text" placeholder="<?= $app->Locales->getKey('username'); ?>" class="username" name="username" required="required" autocomplete="off" />
			
			<br />
			<br />
			
			<input type="password" placeholder="<?= $app->Locales->getKey('password'); ?>" class="password" name="password" required="required" autocomplete="off" />
			
			<br />
			
			<p><button type="submit" id="loginForm-submit"><i class="icon-circle-arrow-right"></i></button></p>
	    </form>
	</div>
    </body>
</html>