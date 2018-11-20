<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name =viewport content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
	<nav class="nav-header-main">
		<a class="header-logo" href="index.php">
			<img src="img/img2.jpg" alt="banner">
		</a>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="#">Portfolio</a></li>
			<li><a href="#">About me</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
		<div class="header-login">
			<form action="includes/login.php" method="post">
				<input type="text" name="mailuid" placeholder="Username/Email">
				<input type="password" name="pwd" placeholder="Password">
				<button type="submit" name="login-submit">LOGIN</button>
			</form>
			<a href="includes/signin.php"> SIGN IN</a>
			<form action="includes/logout.php">
				<button type="submit" name="logout-submit">LOG OUT</button>
			</form>
		</div>
	</nav>
</header>
 