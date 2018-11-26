<?php  
session_start();

$id = $_SESSION['uId'];

require 'dbconn.inc.php';

$sqlImg = "SELECT profileImg FROM userpictures WHERE userID = '$id'";
				
$imageresult = mysqli_query($conn, $sqlImg);				
				
if(mysqli_num_rows($imageresult)>0){
	while($rowImg = mysqli_fetch_assoc($imageresult)) {		
		$url = $rowImg["profileImg"];
		echo "<img src='upload/$url'>";	
	}
} else {
	echo "<img src='upload/profiledefault.png'>";
}			

?>