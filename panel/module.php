<?php

require 'lib/kompakt/Kompakt.php';

$_GET['action'] = (isset($_GET['action'])) ? $_GET['action'] : null;

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/module/list.controller.php';
		require 'app/views/module/list.view.php';
		break;

	case 'add':
		require 'app/controllers/module/add.controller.php';
		require 'app/views/module/add.view.php';
		break;
	
	default:
		require 'app/controllers/noaction/noaction.controller.php';
		require 'app/views/noaction/noaction.view.php';
		break;
}

?>