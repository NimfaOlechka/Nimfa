<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name =viewport content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<title>SEE YOU</title>
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<header>
	<nav class="w3-bar w3-teal">
		<a href="index.php" class="w3-bar-item w3-button w3-mobile">Home</a>
		<a href="profile.php" class="w3-bar-item w3-button w3-mobile">Profile</a>
		<a href="education.php" class="w3-bar-item w3-button w3-mobile">Education</a>
		<a href="myArt.php" class="w3-bar-item w3-button w3-mobile">My Art</a>	
		<a href="myDiary.php" class="w3-bar-item w3-button w3-mobile">My Diary</a>	
	</nav>
<div class="w3-container">
		<?php  
			if (isset($_SESSION['uId'])){
				echo '<form action="includes/logout.inc.php" class="w3-card-4">
					<button class="w3-button w3-sand" type="submit" name="submit-logout">LOG OUT</button>
				</form>';
			}
			else {
				echo '<form action="includes/login.inc.php" method="post" class="w3-card-4">
				<input type="text" name="uidmail" placeholder="Username/Email" class="w3-input">
				<input type="password" name="pwd" placeholder="Password" class="w3-input">
				<button type="submit" name="submit-login" class="w3-button w3-sand">LOGIN</button>
				<a href="signin.php" class="w3-button"> SIGN IN</a>
			</form>';
			}
		?>		
	</div>	
	
</header>
 