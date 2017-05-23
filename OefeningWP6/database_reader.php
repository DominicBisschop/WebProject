<?php

class DatabaseConfigReader {
	private $user;
	private $password;
	private $database;
	private $hostname;
	
	function __construct($dbConfigFile)
	{
		
		$xml=simplexml_load_file("database_config.xml");
		$user = $xml->user;
		$password = $xml->password;
		$database = $xml->database;
		$hostname =  $xml->hostname;
	}
	
	public function getUser() {
        return $this->$user;
    }
	public function getPassword() {
        return $this->$password;
    }
	public function getDatabase() {
        return $this->$database;
    }
	public function getHostname() {
        return $this->$hostname;
    }
}
?>