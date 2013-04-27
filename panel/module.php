<?php

require 'lib/kompakt/Kompakt.php';

$_GET['action'] = (isset($_GET['action'])) ? $_GET['action'] : null;

switch ($_GET['action']) {
	case 'list':
		require 'app/controllers/module/list.controller.php';
		require 'app/views/module/list.view.php';
		break;
	
	default:
		# code...
		break;
}

?>