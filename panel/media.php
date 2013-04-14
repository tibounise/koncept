<?php 

require 'lib/kompakt/Kompakt.php';

$_GET['action'] = (isset($_GET['action'])) ? $_GET['action'] : null;

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/media/medialist.controller.php';
		require 'app/views/media/medialist.view.php';
		break;

	case 'upload':
		require 'app/controllers/media/upload.controller.php';
		require 'app/views/media/upload.view.php';
		break;

	case 'addfolder':
		require 'app/controllers/media/addfolder.controller.php';
		require 'app/views/media/addfolder.view.php';
		break;

	case 'rmfolder':
		require 'app/controllers/media/rmfolder.controller.php';
		require 'app/views/media/rmfolder.view.php';
		break;

	case 'rmfile':
		require 'app/controllers/media/rmfile.controller.php';
		require 'app/views/media/rmfile.view.php';
		break;
	
	default:
		require 'app/controllers/noaction/noaction.controller.php';
		require 'app/views/noaction/noaction.view.php';
		break;
}

?>