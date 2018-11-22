<?php 
require "header.php"
?>

<main>
	<div class="w3-panel w3-khaki">
		<section class="section-default">
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
		
	</div>
	
</main>

<?php 
require "footer.php"
?>