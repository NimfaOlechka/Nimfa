<?php
 class DBC {

 	private $servername;
 	private $username;
 	private $password;
 	private $dbname;
 	private $charset;

 	public function connect(){
 		$this->servername = "localhost";
 		$this->username = "root";
 		$this->password = "";
 		$this->dbname = "ssdb";
 		$this->charset = "utf8mb4";

 		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
 		return $conn;
 	}
 }
 
 	/*try {
 		
 		//data source name
 		$dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
 		$pdo = new PDO($dsn, $this->servername, $this->password);
 		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		return $pdo;
 	}
 	catch (PDOException $e){
 		echo "Connection failed: ".$e->getMessage();
 	}
 }*/

 