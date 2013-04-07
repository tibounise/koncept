<?php 

require 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/element/elementlist.controller.php';
		require 'app/views/element/elementlist.view.php';
		break;

	case 'new':
		require 'app/controllers/element/newelement.controller.php';
		require 'app/views/element/newelement.view.php';
		break;

	case 'remove':
		require 'app/controllers/element/rmelement.controller.php';
		require 'app/views/element/rmelement.view.php';
		break;

	case 'edit':
		require 'app/controllers/element/editelement.controller.php';
		require 'app/views/element/editelement.view.php';
	
	default:
		# code...
		break;
}

?>