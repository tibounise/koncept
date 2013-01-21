<?php
/**
 * Class to do some verifications on users
 *
 * @package user
 */

class Login {
    /**
     * Checks the login in the database
     *
     * @param string $username
     * @param string $password
     * @param type $koncept_db
     * @param type $kcpt_config
     * @return boolean
     */
    public static function checkSQL($username, $password, &$koncept_db) {
        $dbrequest = $koncept_db->prepare('SELECT * FROM ' . $koncept_db->getPrefix() . 'users WHERE username = :username AND password = :password');
        $dbrequest->execute(array(
            ':username' => $username,
            ':password' => $password
        ));
        if ($dbrequest->fetch()) {
            
            return true;
        } else {
            
            return false;
        }
    }
    /**
     * Check if the user exists in the database
     *
     * @param string $username
     * @param type $koncept_db
     * @param type $kcpt_config
     * @return boolean
     */
    public static function userExistsSQL($username, &$koncept_db) {
        $dbrequest = $koncept_db->prepare('SELECT * FROM ' . $koncept_db->getPrefix() . 'users WHERE username = :username');
        $dbrequest->execute(array(
            ':username' => $username
        ));
        if ($dbrequest->fetch()) {
            
            return true;
        } else {
            
            return false;
        }
    }
    /**
     * Check the login in the configuration.php
     *
     * @param string $username
     * @param string $password
     * @param type $kcpt_config
     * @return boolean
     */
    public static function checkSA($username, $password, &$kcpt_config) {
        $loginInfos = $kcpt_config->getSALogin();
        if ($username == $loginInfos['username'] && $password == $loginInfos['password']) {
            return true;
        } else {
            
            return false;
        }
    }
}
?>