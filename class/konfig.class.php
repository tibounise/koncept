<?php

/**
 * Koncept configurator
 * @package konfig
 */

/**
 * Koncept configurator class
 * 
 * @author TiBounise <contact@tibounise.com>
 */
class Konfig {

    /**
     * Username of the database
     * 
     *  @var string
     *  @access protected
     */
    protected $database_username;

    /**
     * Password of the database
     * 
     *  @var string
     *  @access protected
     */
    protected $database_password;

    /**
     * Port of the database
     * 
     *  @var string
     *  @access protected
     */
    protected $database_port;

    /**
     * Hostname of the database
     * 
     *  @var string
     *  @access protected
     */
    protected $database_hostname;

    /**
     * Name of the database
     * 
     *  @var string
     *  @access protected
     */
    protected $database_name;

    /**
     * Prefix of the database tables
     * 
     *  @var string
     *  @access protected
     */
    protected $database_prefix;

    /**
     * Username of the super-admin
     * 
     *  @var string
     *  @access protected
     */
    protected $superadmin_username;

    /**
     * Password of the super-admin
     * 
     *  @var string
     *  @access protected
     */
    protected $superadmin_password;

    /**
     * Language
     * 
     * @var string
     * @access protected
     */
    protected $language;

    /**
     * Set the database informations
     * 
     * @return null
     * @access public
     * @param string $username Username of the database
     * @param string $password Password of the database
     * @param int $port Port of the database
     * @param string $hostname Hostname of the database
     * @param string $name Name of the database
     * @param string $prefix Prefix of the database tables
     */
    public function setDBSettings($username, $password, $port, $hostname, $name, $prefix) {
	$this->database_username = $username;
	$this->database_password = $password;
	if ($port == 'default') {
	    $this->database_port = 3306;
	} else {
	    $this->database_port = $port;
	}
	$this->database_hostname = $hostname;
	$this->database_name = $name;
	$this->database_prefix = $prefix;
	return null;
    }

    /**
     * Get the database informations
     * 
     * @return array
     * @access public
     */
    public function getDBSettings() {
	return array('username' => $this->database_username,
	    'password' => $this->database_password,
	    'port' => $this->database_port,
	    'hostname' => $this->database_hostname,
	    'name' => $this->database_name,
	    'prefix' => $this->database_prefix);
    }

    /**
     * Set the super-admin informations
     * 
     * @return null
     * @access public
     * @param string $username Username of the super-admin
     * @param string $password Password of the super-admin
     */
    public function setSALogin($username, $password) {
	$this->superadmin_username = $username;
	$this->superadmin_password = $password;
	return null;
    }

    /**
     * Get the super-admin informations
     * 
     * @return array
     * @access public
     */
    public function getSALogin() {
	return array('username' => $this->superadmin_username,
	    'password' => $this->superadmin_password);
    }

    public function setLanguage($language) {
	$this->language = $language;
	return null;
    }

    public function getLanguage() {
	return $this->language;
    }

}

?>