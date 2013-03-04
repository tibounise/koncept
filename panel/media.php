<?php 

include 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'list':
		include 'app/controllers/medialist.controller.php';
		include 'app/views/medialist.view.php';
		break;

	case 'upload':
		include 'app/controllers/upload.controller.php';
		include 'app/views/upload.view.php';
		break;

	case 'addfolder':
		include 'app/controllers/addfolder.controller.php';
		include 'app/views/addfolder.view.php';
		break;

	case 'rmfolder':
		include 'app/controllers/rmfolder.controller.php';
		include 'app/views/rmfolder.view.php';
		break;

	case 'rmfile':
		include 'app/controllers/rmfile.controller.php';
		include 'app/views/rmfile.view.php';
		break;
	
	default:
		// No defined action
		break;
}

?>