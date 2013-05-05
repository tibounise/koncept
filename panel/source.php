<?php

require 'lib/kompakt/Kompakt.php';

$_GET['action'] = (isset($_GET['action'])) ? $_GET['action'] : null;

switch ($_GET['action']) {
	case 'srclist':
		require 'app/controllers/source/srclist.controller.php';
		require 'app/views/source/srclist.view.php';
		break;

	case 'pkglist':
		require 'app/controllers/source/pkglist.controller.php';
		require 'app/views/source/pkglist.view.php';
		break;

	case 'addsource':
		require 'app/controllers/source/addsource.controller.php';
		require 'app/views/source/addsource.view.php';
		break;

	case 'delete':
		require 'app/controllers/source/delete.controller.php';
		require 'app/views/source/delete.view.php';
		break;
	
	default:
		require 'app/controllers/noaction/noaction.controller.php';
		require 'app/views/noaction/noaction.view.php';
		break;
}

?>