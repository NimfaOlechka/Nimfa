<?php 
require "header.php"
?>

<main>
	<div class="w3-panel w3-khaki">
		<section class="w3-panel">
		<?php  
			if (isset($_SESSION['uId'])){
				echo '<p>You are logged in!</p>';
			}
			else {
				echo '<p>You are logged out!</p>';
			}
		?> 		
		</section>		
	</div>

	<div class="w3-container w3-sand w3-third">
		<form action="includes/myart.inc.php" method="POST" enctype="multipart/form-data" class="w3-container w3-card-4">
			<h6>Upload your Art</h6>
			<p><input type="input" name="artname" placeholder="Art name"></p>
			<p><input type="input" name="arttitle" placeholder="Art title"></p>
			<p><input type="input" name="artdesc" placeholder="art description"></p>
			<p><label class="">Add a photo:</label><input type="file" name="file" class="w3-select"></p>
			
			<button id="submit-upload" type="submit" name="submit-upload" class="w3-button w3-light-gray w3-border">UPLOAD</button>
						
		</form>
	</div>
	<section>
		<div id="demopic" class="w3-container w3-twothird w3-sand">
			<p class="gallery">Result will be her:</p>	
		</div>
		
		<div class="gallery-container" >
		<?php

		$uid = $_SESSION['uId'];

		//db connection
		require 'includes/dbconn.inc.php';

		$sql = "SELECT * FROM userartcollection WHERE userID = ? ORDER BY orderart DESC";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "try again it!";
			exit();
		}
		else {
			//bind parametrs n execute
			mysqli_stmt_bind_param($stmt, "s", $uid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			while($row = mysqli_fetch_assoc($result)){
				echo '<a href="#">
					  <div style="background-image: url(usersart/'.$row["artname"].');"></div>
					  <h3>'.$row["arttitle"].'</h3>
					  <p>'.$row["artabout"].'</p>				
					  </a>';
				}				
		}		
			?>
		</div>
	</section>
	
</main>
<script>
/*	$(document).ready(() =>{
		var url = "includes/myartcontent.inc.php";
	var img_obj =
	{
		'userID': ' ',
		'userArt': ' ',
		'userImage': ''		
	}
	
	//create requests variable
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status ==200){
			imj_obj = this.responseText;
			img_obj = JSON.parse(img_obj);
			
			addImages(imj_obj);
		}
	};
		xhttp.open("GET","includes/myartcontent.inc.php",true);
		xhttp.send();
	
function addImages(data){
foreach (dataitem in data){
	$srcImg = dataitem.userImage;
	 var image = document.createElement("img");
	 image.attr('src', $srcImg);
	document.getElementById("demopic").appendChild(image);
} // return array of objects	
	
}

	});
</script>

<?php 
require "footer.php"
?>