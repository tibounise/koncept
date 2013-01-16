<?php

class KonceptDB {
	protected $pdo;

	public function __construct($username,$password,$hostname,$port,$dbname) {
		$this->openSQL($username,$password,$hostname,$port,$dbname);
	}

	protected function openSQL($username,$password,$hostname,$port,$dbname) {
		$dsn = 'mysql:dbname='.$dbname.';host='.$hostname.';port='.$port;
		try {
			$this->pdo = new PDO($dsn,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		} catch (PDOException $e) {
			print '<br />SQL error : '.$e->getMessage().'<br/>';
    		die();
		}
	}

	protected function closeSQL() {
		unset($this->pdo);
	}

	public function __destruct() {
		$this->closeSQL();
	}
}

?>