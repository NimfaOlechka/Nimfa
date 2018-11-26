<?php
session_start();

$uid = $_SESSION['uId'];

//db connection
require 'dbconn.inc.php';

$sql = "SELECT * FROM userartcollection WHERE userID = ? ORDER BY orderart DESC";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($conn, $sql)) {
	echo "try again it!";
	exit();
}
else {
	//bind parametrs n execute
	mysqli_stmt_bind_param($stmt, "s", $uid);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_store_result($stmt);

	if (mysqli_stmt_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){
			$artCollection = json_encode($row);
		}
		
	} else {
		echo "No pictures yet! Add some!";
		exit();
	}
}

mysqli_close($conn);

echo ($artCollection);

?>