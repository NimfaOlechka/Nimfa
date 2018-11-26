<?php
session_start();

//inserting or updating user profile avatar
//TODO: prepare statement

if (isset($_POST['upload'])) {

	//db connection
	require 'dbconn.inc.php';

	//store variables
	$id = $_SESSION['uId'];

	$file = $_FILES['ufoto'];
	
	$fileName = $_FILES['ufoto']['name'];
	$fileTmpName = $_FILES['ufoto']['tmp_name'];
	$fileSize = $_FILES['ufoto']['size'];
	$fileError = $_FILES['ufoto']['error'];
	$fileType = $_FILES['ufoto']['type'];	
	
	//splitting name into 2 strings by '.' delimiter 
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	//allowed extensions
	$allowed = array('jpg', 'jpeg', 'png', 'gif');

	//check if it's allowed file is to be upload
	if (in_array($fileActualExt, $allowed)){
		if($fileError === 0){

			//setting file size 
			if ($fileSize < 1000000) {
				//seting name
				$fileNameNew = "profile".$id.".".$fileActualExt;
				//destination of file
				$fileDestination = '../upload/'.$fileNameNew;
				//upload file to server
				move_uploaded_file($fileTmpName, $fileDestination);

			$sqlChk = "SELECT profileImg FROM userpictures WHERE userID = '$id'";

			$resultChk = mysqli_query($conn, $sqlChk);
				if (mysqli_num_rows($resultChk) > 0) {
					# update sql if something was changed
					$sql = "UPDATE userpictures SET profileImg = '$fileNameNew', status = 0 WHERE userID = '$id'";
				} else {
					# insert new 
					$sql = "INSERT INTO userpictures (userID, status, profileImg) VALUES ('$id', 0,'$fileNameNew')";
				}
				
				$result = mysqli_query($conn, $sql);

				header("Location: ../profile.php");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You can't upload files of this type!";
	}
mysqli_close($conn);
}

?>