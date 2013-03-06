<?php

namespace Kompakt\Handlers;

class User {
	public static function login($username) {
		$_SESSION['logged'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['token'] = uniqid();
	}

	public static function checkToken($token) {
		return $_SESSION['token'] == $token;
	}
	
	public static function logout() {
		$_SESSION['logged'] = false;
		$_SESSION['username'] = null;
		$_SESSION['token'] = null;
	}

	public static function logProtection() {
		if (isset($_SESSION['logged']) && $_SESSION['logged']) {
			return true;
		} else {
			header('Location: login.php');
		}
	}

	public static function checkLogged() {
		if (isset($_SESSION['logged']) && $_SESSION['logged']) {
			return true;
		} else {
			return false;
		}
	}

	public static function getToken() {
		return (!empty($_SESSION['token'])) ? $_SESSION['token'] : false;
	}
}

?>