<?php

class Database{
	public $authData;
	public $connection;

	function __construct($authData){
		$this->authData = $authData;
		/*
 	$authData = array('login' => 'root', 'password' => '123456', 'host' => 'localhost', 'database' => 'QueryCMS');


		 */

 	$link = new mysqli($this->authData['host'], $this->authData['login'], $this->authData['password'], $this->authData['database']);
 	if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
    $this->connection = $link;


	}

	public function query($query){
		return $this->connection->query($query);
	}
	public function escape($string){
		return $this->connection->real_escape_string($string);
	}

	
}
?>