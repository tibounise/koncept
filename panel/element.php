<?php 

include 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'list':
		include 'app/controllers/elementlist.controller.php';
		include 'app/views/elementlist.view.php';
		break;

	case 'new':
		include 'app/controllers/newelement.controller.php';
		include 'app/views/newelement.view.php';
		break;

	case 'remove':
		include 'app/controllers/rmelement.controller.php';
		include 'app/views/rmelement.view.php';
		break;

	case 'edit':
		include 'app/controllers/editelement.controller.php';
		include 'app/views/editelement.view.php';
	
	default:
		# code...
		break;
}

?>