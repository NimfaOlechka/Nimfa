<?php 
require "../header.php"
?>

<main>
	<div>
		<section>
			<h1>Sign IN</h1>
			<form action="includes/signin.php" method="post">
				<input type="text" name="uid" placeholder="Username">
				<input type="text" name="mail" placeholder="E-mail">
				<input type="password" name="psd" placeholder="Password">
				<input type="password" name="psd-repeat" placeholder="Repeat password">
				<button type="submit" name="signin-submit">SIGN UP</button>
			</form>
		</section>
	</div>
</main>

<?php 
require "../footer.php"
?>