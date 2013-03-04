<?php 

include 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'addelement':
		include 'app/controllers/addelement.processor.controller.php';
		include 'app/views/addelement.processor.view.php';
		break;

	case 'rmelement':
		include 'app/controllers/rmelement.processor.controller.php';
		include 'app/views/rmelement.processor.view.php';
		break;
	
	case 'editelement':
		include 'app/controllers/editelement.processor.controller.php';
		include 'app/views/editelement.processor.view.php';
		break;

	case 'uploadmedia':
		include 'app/controllers/uploadmedia.processor.controller.php';
		include 'app/views/uploadmedia.processor.view.php';
		break;

	case 'addfolder':
		include 'app/controllers/addfolder.processor.controller.php';
		include 'app/views/addfolder.processor.view.php';
		break;

	case 'rmfolder':
		include 'app/controllers/rmfolder.processor.controller.php';
		include 'app/views/rmfolder.processor.view.php';
		break;

	case 'rmfile':
		include 'app/controllers/rmfile.processor.controller.php';
		include 'app/views/rmfile.processor.view.php';
		break;

	default:
		# code...
		break;
}

?>