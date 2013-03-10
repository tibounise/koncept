<?php 

require 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/elementlist.controller.php';
		require 'app/views/elementlist.view.php';
		break;

	case 'new':
		require 'app/controllers/newelement.controller.php';
		require 'app/views/newelement.view.php';
		break;

	case 'remove':
		require 'app/controllers/rmelement.controller.php';
		require 'app/views/rmelement.view.php';
		break;

	case 'edit':
		require 'app/controllers/editelement.controller.php';
		require 'app/views/editelement.view.php';
	
	default:
		# code...
		break;
}

?>