<?php

require 'lib/kompakt/Kompakt.php';

$_GET['action'] = (isset($_GET['action'])) ? $_GET['action'] : null;

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/route/routerlist.controller.php';
		require 'app/views/route/routerlist.view.php';
		break;

	case 'new':
		require 'app/controllers/route/newroute.controller.php';
		require 'app/views/route/newroute.view.php';
		break;

	case 'delete':
		require 'app/controllers/route/rmroute.controller.php';
		require 'app/views/route/rmroute.view.php';
		break;

	case 'edit':
		require 'app/controllers/route/editroute.controller.php';
		require 'app/views/route/editroute.view.php';
		break;
	
	default:
		require 'app/controllers/noaction/noaction.controller.php';
		require 'app/views/noaction/noaction.view.php';
		break;
}

?>