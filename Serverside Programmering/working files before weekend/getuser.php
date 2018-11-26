<?php 

class User extends DBC {

	public function getAllUsers(){
		$sql = "SELECT users.userName, userprofile.userFName, userprofile.userLName, userprofile.userImage
FROM users 
INNER JOIN userprofile
ON users.userId = userprofile.userID
WHEre users.userId = 3";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0) {
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}	
}

class ViewUser extends User {

	public function showAllUsers(){
		$info = $this->getAllUsers();

		foreach ($info as $user) {
			echo $user['userName']."<br>";
			echo $user['userFName']."<br>";
			echo $user['userLName']."<br>";
			echo $user['userImage']."<br>";
		}
	}	
}