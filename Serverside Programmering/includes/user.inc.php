<?php 

class User extends DBC {

	public function getAllUsers(){

		$stmt = $this->connect()->query(
		"SELECT * FROM users"
		);
		
		while ($row = $stmt->fetch()){

			$userName = $row['userName']."<br>";
			echo $userName;		
		}					
	}	

	public function getUsersCC(){
		$id = 3;
		$userName = "test3";

		$stmt = $this->connect()->prepare(
			"SELECT * FROM users WHERE userId = ? AND userName = ?"
		); 
		$stmt->execute([$id, $userName]);

		if ($stmt->rowCount()){
			while($row = $stmt->fetch()){
				return $row['userPsw'];
			}

		} else {

		}
	}
}