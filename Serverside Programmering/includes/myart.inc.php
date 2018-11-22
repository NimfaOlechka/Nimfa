<?php 

if(isset($_POST['submit-upload'])){

	//database connection
	#require 'dbconn.php';
	
	$file = $_FILES['file'];
	
	print_r($file);

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	//splitting name into 2 strings by '.' delimiter 
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	//allowed extensions
	$allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

	if (in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if ($fileSize < 1000000) {

				$fileNameNew = uniqid('', true).".".$fileActualExt;
				//destination of file
				$fileDestination = '../upload/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);

				header("Location: ../myart.php");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You can't upload files of this type!";
	}

}

?>