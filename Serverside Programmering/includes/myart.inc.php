<?php 
session_start();

if(isset($_POST['submit-upload'])){

	$id = $_SESSION['uId'];

	$newFileName = $_POST['artname'];

	if (empty($_POST['artname'])) {
		$newFileName = "gallery";
	} else {
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}

	$atitle = $_POST['arttitle'];
	$adesc = $_POST['artdesc'];
	$afolder = "usersart";
	
	$file = $_FILES['file'];
	//print_r($file);

	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];
	
	//splitting name into 2 strings by '.' delimiter 
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	//allowed extensions
	$allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

	if (in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if ($fileSize < 500000) {

				$newFileName = $newFileName.".".uniqid("", false).".".$fileActualExt;
				//destination of file
				$fileDestination = '../usersart/'.$newFileName;

				//database connection
				require 'dbconn.inc.php';

				if (empty($atitle) || empty($adesc)) {
					header("Location:../myart.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM userartcollection;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "try again!";
						exit();
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImgOrder = $rowCount + 1;

						$sql = "INSERT INTO `userartcollection`( userID, artname, arttitle, artabout, orderart, artfolder ) VALUES (?,?,?,?,?,?);";
						
						if(!mysqli_stmt_prepare($stmt, $sql)){
							echo "try again";
							exit();
						} else {
							mysqli_stmt_bind_param($stmt, "ssssss", $id,$newFileName,$atitle,$adesc,$setImgOrder,$afolder);
							mysqli_stmt_execute($stmt);

							//move file to server
							move_uploaded_file($fileTmpName, $fileDestination);
							header("Location: ../myart.php");

						}
					}
				}				
			} else {
				echo "Your file is too big!";
				exit();
			}
		} else {
			echo "There was an error uploading your file!";
			exit();
		}
	} else {
		echo "You can't upload files of this type!";
		exit();
	}

}

?>