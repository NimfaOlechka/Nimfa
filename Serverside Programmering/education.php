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

	<div class="w3-container w3-sand">
		<form class="w3-container w3-card-4" action="includes/profile.inc.php" method="POST">
			<input  id="institution" type="text" name="institution" placeholder="Institution" class="w3-input">
			<input id="degree" type="text" name="degree" placeholder="Degree" class="w3-input">
			<br>
			Start Year:<input type="date" name="sday" class="w3-select">
			Finish Year:<input type="date" name="fday" class="w3-select">
			<br>
			<button id="submit-edu" type="submit" name="submit-edu" class="w3-button w3-light-gray w3-border">SAVE</button>
			<p class="form-message"></p>			
		</form>
	</div>
	
</main>
<script>
	$(document).ready(function () {
		$("form").submit(function(event){
			event.preventDefault();
			var fname = $("#ufname").val();
			var lname = $("#ulname").val();
			var bcity = $("#ubcity").val();
			var gender = $("#ugender").val();
			var submit = $("#submit-profile").val();
			$(".form-message").load("includes/profile.inc.php", {
				fname: fname,
				lname: lname,
				bcity: bcity,
				gender: gender,
				submit: submit
			});
		});
	});
</script>

<?php 
require "footer.php"
?>