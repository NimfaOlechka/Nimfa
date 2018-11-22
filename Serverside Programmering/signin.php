<?php 
require "header.php"
?>

<main>
	<div class="w3-container">
		<section>
			<h1>Sign IN</h1>
			<?php  
				if(isset($_GET['error'])){
					if ($_GET['error'] == "emptyfields") {
						echo '<p> You should fill in all fields!</p>';
					}
					else if ($_GET['error'] == "invalidUserData") {
						echo '<p>Invalid username and e-mail!</p>';
					}
					else if ($_GET['error'] == "invalidmail") {
						echo '<p>Invalid e-mail!</p>';
					}
					else if ($_GET['error'] == "invalidUID") {
						echo '<p>You should use only characters and number, no special symbols allowed!</p>';
					}
					else if ($_GET['error'] == "passwordsNotMatch") {
						echo '<p>Your passwords does not match</p>';
					}
					else if ($_GET['error'] == "usertaken") {
						echo '<p>Sorry, these username is taken!</p>';
					}					
				}
				
				else if (isset($_GET['signin'])){
					if ($_GET['signin'] == "success"){
						echo 'U can log in now';
					}

				}
				else {
					echo 'Sign Up with us today!';
				}
			?>
			<form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" action="includes/signin.inc.php" method="post">
				<input type="text" name="uid" placeholder="Username" class="w3-input">
				<input type="text" name="email" placeholder="E-mail" class="w3-input">
				<input type="password" name="psd" placeholder="Password" class="w3-input">
				<input type="password" name="rpsd" placeholder="Repeat password" class="w3-input">
				<button type="submit" name="submit-signin" class="w3-button">SIGN UP</button>
			</form>
		</section>
	</div>
</main>

<?php 
require "footer.php"
?>