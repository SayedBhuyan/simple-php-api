<?php

class DB {
	// Properties
	private $dbhost = "localhost";
	private $dbname = "slimapp";
	private $dbuser = "root";
	private $dbpass = "";

	public function connect() {
		$pdo_string = "mysql:dbhost=$this->dbhost;dbname=$this->dbname";
		$dbConnection = new PDO($pdo_string, $this->dbuser, $this->dbpass);
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbConnection;
	}
}