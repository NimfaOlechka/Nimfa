<?php
session_start();

//inserting or updating userprofile table

if (isset($_POST['submit-profile'])) {

	//db connection
	require 'dbconn.inc.php';

	//store variables
	$id = $_SESSION['uId'];

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$bcity = $_POST['bcity'];
	$bday = $_POST['bday'];
	

	if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
		header("Location: ../profile.php?error=invalidFName");
		exit();
	}
	else if(!preg_match("/^[a-zA-Z]*$/", $lname)){
		header("Location: ../profile.php?error=invalidLName");
		exit();
	}
	else if (!preg_match("/^[a-zA-Z]*$/", $bcity)) {
		header("Location: ../profile.php?error=invalidCity");
		exit();
	}
	else {
		
		$sqlChk = "SELECT * FROM userprofile WHERE userID = '$id'";
		$resultChk = mysqli_query($conn, $sqlChk);

		if (mysqli_num_rows($resultChk) > 0) {

			$sql = "UPDATE userprofile SET userFName = ?, userLName = ?, userBirthday = ?, userCity = ? WHERE userID = '$id'";
			$stmt = mysqli_stmt_init($conn);

			//check statement
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../profile.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $bday, $bcity);					
			}		
		} else {
			# insert new
			$sql = "INSERT INTO userprofile (userID, userFName, userLName, userBirthday, userCity) VALUES (?,?,?,?,?)";	
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../profile.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "sssss",$id, $fname, $lname, $bday, $bcity);
			}	
		}

		mysqli_stmt_execute($stmt);	
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);		
		header("Location:../index.php?success");
	}	
}

?>


	