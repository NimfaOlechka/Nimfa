<?php
session_start();

//connection to db
require 'dbconn.inc.php';

$id = $_SESSION['uId'];


$sql = "SELECT * from userprofile WHERE userID = ?";
$stmt = mysqli_stmt_init($conn);

//check if prepare statement can run
if (!mysqli_stmt_prepare($stmt, $sql)) {
	header("Location: ../index.php?error=sqlerror");
	exit();
} 
else {
	//if no errors run code n get result
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($result)){
		
		$json = json_encode($row);
		echo($json);
	} else {
		header("Location:../profile.php?nouserprofile");
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn); 	
}
?>