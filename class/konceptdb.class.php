<?php

class KonceptDB {

    protected $pdo;
    protected $prefix;

    public function __construct($db_config) {
	$this->openSQL($db_config['username'],$db_config['password'],$db_config['hostname'],$db_config['port'],$db_config['name']);
	$this->prefix = $db_config['prefix'];
	return null;
    }

    protected function openSQL($username, $password, $hostname, $port, $dbname) {
	$dsn = 'mysql:dbname=' . $dbname . ';host=' . $hostname . ';port=' . $port;
	try {
	    $this->pdo = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	} catch (PDOException $e) {
	    print '<br />SQL error : ' . $e->getMessage() . '<br/>';
	    die();
	}
	return null;
    }
    
    public function prepare($query) {
	return $this->pdo->prepare($query);
    }
    
    public function getPrefix() {
	return $this->prefix;
    }

    public function __destruct() {
	unset($this->pdo);
	return null;
    }

}

?>