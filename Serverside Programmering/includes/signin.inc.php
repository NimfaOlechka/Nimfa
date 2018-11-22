<?php

//check if button was pressed
if (isset($_POST['submit-signin'])){

	// set connection to db
	require 'dbconn.inc.php';
	// fetch users info frm form
	$uName = $_POST['uid'];
	$uEmail = $_POST['email'];
	$uPsd = $_POST['psd'];
	$uPsdR = $_POST['rpsd'];

	//error handlers
	//check if any of the fields are empty
	if (empty($uName) || empty($uEmail) || empty($uPsd) || empty($uPsdR)) {
		header("Location: ../signin.php?error=emptyfields&uid=".$uName."&email=".$uEmail);
		exit();
	}
	//check if both userame and email is valid
	else if (!filter_var($uEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uName) ) {
		header("Location: ../signin.php?error=invalidUserData");
		exit();
	}
	//check if email adress is valid
	else if (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signin.php?error=invalidmail&uid=".$uName);
		exit();
	}
	//check if allowed symbols as username
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $uName)) {
		header("Location: ../signin.php?error=invalidUID&email=".$uEmail);
		exit();
	}
	else if ($uPsd !== $uPsdR) {
		header("Location: ../signin.php?error=passwordsNotMatch&uid=".$uName."&email=".$uEmail);
		exit();
	}
	else {

		//check for user already exist
		$sql = "SELECT userName, userEmail FROM users WHERE userName=? OR userEmail=?";
		$stmt = mysqli_stmt_init($conn);
		//check if prepare statement can run
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signin.php?error=sqlerror");
			exit();
		}
		else {
			//if no errors set users data into sql n run code
			mysqli_stmt_bind_param($stmt, "ss", $uName, $uEmail);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			//if result is 1 than user exist n can't be taken
			if ($resultcheck > 0) {
				header("Location: ../signin.php?error=usertaken&email=".$uEmail);
				exit();
			}
			else {
			//prepare sql to insert user
			$sql = "INSERT INTO users (userName, userPsw, userEmail) VALUES (?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);

				//check if statement can be used
				if (!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../signin.php?error=sqlerror");
					exit();
				} 
				else  {
					// hash password 
					$hashedPsd = password_hash($uPsd, PASSWORD_DEFAULT);
					//insert user
					mysqli_stmt_bind_param($stmt, "sss", $uName, $hashedPsd, $uEmail);
					mysqli_stmt_execute($stmt);
					header("Location: ../signin.php?signin=success");
					exit();
				}
			}			
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {

	header("Location: ../signin.php");
}

?>