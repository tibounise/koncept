<?php

session_start();

if (isset($_SESSION['token'],$_GET['token']) && $_SESSION['token'] == $_GET['token']) {
	session_destroy();
}

header('Location: login.php');

?>
