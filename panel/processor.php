<?php 

require 'lib/kompakt/Kompakt.php';

$_GET['action'] = (isset($_GET['action'])) ? $_GET['action'] : null;

switch ($_GET['action']) {
	case 'addelement':
		require 'app/controllers/element/addelement.processor.controller.php';
		require 'app/views/element/addelement.processor.view.php';
		break;

	case 'rmelement':
		require 'app/controllers/element/rmelement.processor.controller.php';
		require 'app/views/element/rmelement.processor.view.php';
		break;
	
	case 'editelement':
		require 'app/controllers/element/editelement.processor.controller.php';
		require 'app/views/element/editelement.processor.view.php';
		break;

	case 'uploadmedia':
		require 'app/controllers/media/uploadmedia.processor.controller.php';
		require 'app/views/media/uploadmedia.processor.view.php';
		break;

	case 'addfolder':
		require 'app/controllers/media/addfolder.processor.controller.php';
		require 'app/views/media/addfolder.processor.view.php';
		break;

	case 'rmfolder':
		require 'app/controllers/media/rmfolder.processor.controller.php';
		require 'app/views/media/rmfolder.processor.view.php';
		break;

	case 'rmfile':
		require 'app/controllers/media/rmfile.processor.controller.php';
		require 'app/views/media/rmfile.processor.view.php';
		break;

	case 'backup':
		require 'app/controllers/backup/backup.processor.controller.php';
		require 'app/views/backup/backup.processor.view.php';
		break;

	case 'newroute':
		require 'app/controllers/route/newroute.processor.controller.php';
		require 'app/views/route/newroute.processor.view.php';
		break;

	case 'rmroute':
		require 'app/controllers/route/rmroute.processor.controller.php';
		require 'app/views/route/rmroute.processor.view.php';
		break;

	case 'editroute':
		require 'app/controllers/route/editroute.processor.controller.php';
		require 'app/views/route/editroute.processor.view.php';
		break;

	case 'updatesettings':
		require 'app/controllers/settings/settings.processor.controller.php';
		require 'app/views/settings/settings.processor.view.php';
		break;

	case 'addsource':
		require 'app/controllers/source/addsource.processor.controller.php';
		require 'app/views/source/addsource.processor.view.php';
		break;

	case 'addmodule':
		require 'app/controllers/module/addmodule.processor.controller.php';
		require 'app/views/module/addmodule.processor.view.php';
		break;

	case 'deletemodule':
		require 'app/controllers/module/deletemodule.processor.controller.php';
		require 'app/views/module/deletemodule.processor.view.php';
		break;

	default:
		require 'app/controllers/noaction/noaction.controller.php';
		require 'app/views/noaction/noaction.view.php';
		break;
}

?>