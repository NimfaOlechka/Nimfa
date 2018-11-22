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
		<form action="includes/myart.inc.php" method="POST" enctype="multipart/form-data" class="w3-container w3-card-4">
			
			<label class="">Add a photo:</label>
			<input type="file" name="file" class="w3-select">
			
			<button id="submit-upload" type="submit" name="submit-upload" class="w3-button w3-light-gray w3-border">UPLOAD</button>
			<p class="form-message"></p>			
		</form>
	</div>
	
</main>
<script>
	
</script>

<?php 
require "footer.php"
?>