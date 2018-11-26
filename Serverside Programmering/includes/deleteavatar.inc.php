<?php
//deleting  file from folder n updating database
//sql should be set
session_start();

//set db connection
include 'dbconn.inc.php';
//get user id
$id = $_SESSION['uId'];

$sqlfile = "SELECT userArt FROM userpictures WHERE userID = '$id';";
$result = mysqli_query($conn, $sql);


if (file_exists("uploads/".$filenameofimage) == false) {
	# return user to front page header+exit..
} else {
	// delete file
}

$filepath = "userart/profile".$id."*";
$fileinfo = glob($filepath);
$fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];

$file = "uploads/profile".$id.".".$fileactualext;
//delete file from folder
if(!unlink($file)){

	echo "File wasn't deleted!";

} else {
	echo "File was deleted";
}
//update query
$sql = "UPDATE userpictures SET userArt = '' WHERE userID = '$id' AND userArt = '';";
mysqli_query($conn, $sql);
header("Location:...");
