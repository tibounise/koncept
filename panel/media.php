<?php 

require 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/medialist.controller.php';
		require 'app/views/medialist.view.php';
		break;

	case 'upload':
		require 'app/controllers/upload.controller.php';
		require 'app/views/upload.view.php';
		break;

	case 'addfolder':
		require 'app/controllers/addfolder.controller.php';
		require 'app/views/addfolder.view.php';
		break;

	case 'rmfolder':
		require 'app/controllers/rmfolder.controller.php';
		require 'app/views/rmfolder.view.php';
		break;

	case 'rmfile':
		require 'app/controllers/rmfile.controller.php';
		require 'app/views/rmfile.view.php';
		break;
	
	default:
		// No defined action
		break;
}

?>