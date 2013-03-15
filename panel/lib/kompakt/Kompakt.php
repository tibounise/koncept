<?php

/*~-- Define the essentials constants of Kompakt --~*/
define('USER_HANDLING',1);
define('CONFIG',2);
define('FETCHER',4);
define('LOG_PROTECTION',8);
define('ERROR',16);
define('LOCALIZED',32);
define('MEDIATIZER',64);
define('ROUTER',128);

/*~-- Handlers --~*/
require 'handlers/kompakt.class.php';
require 'handlers/fukon.class.php';
require 'handlers/user.class.php';
require 'handlers/elementy.class.php';
require 'handlers/fetcher.class.php';
require 'handlers/error.class.php';
require 'handlers/mediatizer.class.php';
require 'handlers/router.class.php';

/*~-- Helpers --~*/
require 'helpers/sanitize.class.php';
require 'helpers/stringcheck.class.php';
require 'helpers/beautifier.class.php';
require 'helpers/archiver.class.php';

// Define our application element
$app = new Kompakt();

?>