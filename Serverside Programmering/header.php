<?php 
session_start();
$loggedIn = isset($_SESSION['uId']);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name =viewport content="width=device-width, initial-scale=1">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<title>SEE YOU</title>
	
	
</head>
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body>
<header>
	
<div class="w3-container">
	<div class="login">
			<?php if(!$loggedIn):?>

			<form action="includes/login.inc.php" method="post" class="w3-card-4">
				<input type="text" name="uidmail" placeholder="Username/Email" class="w3-input">
				<input type="password" name="pwd" placeholder="Password" class="w3-input">
				<button type="submit" name="submit-login" class="w3-button w3-sand">LOGIN</button>
				<a href="signin.php" class="w3-button"> SIGN IN</a>
			</form

			<?php else:?>
			<nav class="w3-bar w3-teal">
				<a href="index.php" class="w3-bar-item w3-button w3-mobile">Home</a>
				<a href="profile.php" class="w3-bar-item w3-button w3-mobile">Profile</a>
				<a href="education.php" class="w3-bar-item w3-button w3-mobile">Education</a>
				<a href="myArt.php" class="w3-bar-item w3-button w3-mobile">My Art</a>	
				<a href="myDiary.php" class="w3-bar-item w3-button w3-mobile">My Diary</a>	
			</nav>
			<form action="includes/logout.inc.php" class="w3-card-4">
				<button class="w3-button w3-sand" type="submit" name="submit-logout">LOG OUT</button>
			</form>

			<?php endif;?>
		</div>			
	</div>		
</header>
 