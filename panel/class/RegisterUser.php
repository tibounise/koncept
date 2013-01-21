<?php

/**
 * Class to do modifications on users infos.
 * 
 * @package user
 */

/**
 * Class to register into the database
 *
 * @author TiBounise <contact@tibounise.com>
 */
class RegisterUser {
    /**
     * Add a new user to the database
     * 
     * @param string $username
     * @param string $password
     * @param type $koncept_db
     * @param type $kcpt_config
     * @return boolean
     */
    public static function registerSQL($username,$password,&$koncept_db,&$kcpt_config) {
	if (Login::userExistsSQL($username, $koncept_db, $kcpt_config)) {
	    return false;
	} else {
	    $dbrequest = $koncept_db->prepare('INSERT INTO '.$kcpt_config->getTablePrefix().'users(username,password) VALUES(:username,:password)');
	    $dbrequest->execute(array(':username' => $username,
				      ':password' => $password));
	    return true;
	}
    }
}

?>
