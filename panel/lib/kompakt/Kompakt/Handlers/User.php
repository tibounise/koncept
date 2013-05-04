<?php

namespace Kompakt\Handlers;

/**
 * @package Kompakt\Handlers
 */
class User {
	/**
	 * Registers a user into the session
	 * 
	 * @param string $username Username of the user
	 * @access public
	 */
	public static function login($username) {
		$_SESSION['logged'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['token'] = uniqid();
	}

	/**
	 * Check if the token is good
	 * 
	 * @param string $token Token to check
	 * @return bool Results of the comparaison
	 * @access public
	 */
	public static function checkToken($token) {
		return $_SESSION['token'] == $token;
	}
	
	/**
	 * Unsets the user session
	 * 
	 * @access public
	 */
	public static function logout() {
		$_SESSION['logged'] = false;
		$_SESSION['username'] = null;
		$_SESSION['token'] = null;
	}

	/**
	 * Check if the user can access to panel's pages
	 * 
	 * @return bool Result of the verification
	 * @access public
	 */
	public static function logProtection() {
		if (isset($_SESSION['logged']) && $_SESSION['logged']) {
			return true;
		} else {
			header('Location: login.php');
		}
	}

	/**
	 * Check if the user is logged
	 * 
	 * @return bool Result of the verification
	 * @access public
	 */
	public static function checkLogged() {
		if (isset($_SESSION['logged']) && $_SESSION['logged']) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Returns the token of the logged user
	 * 
	 * @return string Token of the user
	 */
	public static function getToken() {
		return (!empty($_SESSION['token'])) ? $_SESSION['token'] : false;
	}
}

?>