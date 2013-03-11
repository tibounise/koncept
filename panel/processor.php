<?php 

require 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'addelement':
		require 'app/controllers/addelement.processor.controller.php';
		require 'app/views/addelement.processor.view.php';
		break;

	case 'rmelement':
		require 'app/controllers/rmelement.processor.controller.php';
		require 'app/views/rmelement.processor.view.php';
		break;
	
	case 'editelement':
		require 'app/controllers/editelement.processor.controller.php';
		require 'app/views/editelement.processor.view.php';
		break;

	case 'uploadmedia':
		require 'app/controllers/uploadmedia.processor.controller.php';
		require 'app/views/uploadmedia.processor.view.php';
		break;

	case 'addfolder':
		require 'app/controllers/addfolder.processor.controller.php';
		require 'app/views/addfolder.processor.view.php';
		break;

	case 'rmfolder':
		require 'app/controllers/rmfolder.processor.controller.php';
		require 'app/views/rmfolder.processor.view.php';
		break;

	case 'rmfile':
		require 'app/controllers/rmfile.processor.controller.php';
		require 'app/views/rmfile.processor.view.php';
		break;

	case 'backup':
		require 'app/controllers/backup.processor.controller.php';
		require 'app/views/backup.processor.view.php';
		break;

	default:
		# code...
		break;
}

?>