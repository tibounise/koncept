<?php

require 'lib/kompakt/Kompakt.php';

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/routerlist.controller.php';
		require 'app/views/routerlist.view.php';
		break;

	case 'new':
		require 'app/controllers/newroute.controller.php';
		require 'app/views/newroute.view.php';
		break;

	case 'delete':
		require 'app/controllers/rmroute.controller.php';
		require 'app/views/rmroute.view.php';
		break;

	case 'edit':
		require 'app/controllers/editroute.controller.php';
		require 'app/views/editroute.view.php';
		break;
	
	default:
		# code...
		break;
}

?>