<?php

/*~-- Define our version of Kompakt --~*/
define('KOMPAKT-APP', 1.0);

/*~-- Define the essentials constants of Kompakt --~*/
define('USER_HANDLING',1);
define('CONFIG',2);
define('FETCHER',4);
define('LOG_PROTECTION',8);

/*~-- Handlers --~*/
require 'handlers/kompakt.class.php';
require 'handlers/fukon.class.php';
require 'handlers/user.class.php';
require 'handlers/elementy.class.php';
require 'handlers/fetcher.class.php';

/*~-- Helpers --~*/
require 'helpers/sanitize.class.php';
require 'helpers/stringcheck.class.php';

// Define our application element
$app = new Kompakt();

?>