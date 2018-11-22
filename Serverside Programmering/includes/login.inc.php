<?php 
if (isset($_POST['submit-login'])){

	//connection to db
	require 'dbconn.inc.php';
	//fetch user data
	$uidName = $_POST['uidmail'];
	$uPsd = $_POST['pwd'];

	//error handler if some of fields empty
	if (empty($uidName) || empty($uPsd)){
		header("Location: ../signin.php?error=emptyfields");
		exit();
	}
	else {
		//prepare sql for execute
		$sql = "SELECT * FROM users WHERE userName=? OR userEmail=?";
		$stmt = mysqli_stmt_init($conn);
		//check if prepare statement can run
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else {
			//if no errors run code n get result
			mysqli_stmt_bind_param($stmt, "ss", $uidName, $uidName);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				//get users password for checking
				$psdCheck = password_verify($uPsd, $row['userPsw']);
				if ($psdCheck == false) {
					header("Location: ../index.php?error=nouser");
					exit();
				}
				else if ($psdCheck == true){
					session_start();
					$_SESSION['uId'] = $row['userId'];
					$_SESSION['userName'] = $row['userName'];

					header("Location: ../profile.php?login=success");
					exit();
				}
				else {
					header("Location: ../index.php?error=nouser");
					exit();
				}
			}	
			else {
				header("Location: ../index.php?error=nouser");
				exit();
			}		
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

} else {
	header("Location: ../index.php");
}
?>