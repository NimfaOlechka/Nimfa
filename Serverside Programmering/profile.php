<?php 
require "header.php"
?>

<main>
	<div class="w3-panel w3-khaki">
		<section class="w3-panel">
		<?php  
			if (isset($_SESSION['uId'])){

				echo "Hello ".$_SESSION['userName'];
				echo '<p>You are logged in!</p>';

				$id = $_SESSION['uId'];
				require 'includes/dbconn.inc.php';
				$sqlImg = "SELECT status, userImage FROM userprofile WHERE userID = '$id'";
				$imageresult = mysqli_query($conn, $sqlImg);
				
				while($rowImg = mysqli_fetch_assoc($imageresult)) {
					echo "<div>";
						if ($rowImg['status'] == 1) {
							$url = $rowImg["userImage"];
							echo "<img class = 'myImage' src='$url'>";
						} else {
							echo "<img src='upload/profiledefault.png'>" ;
						}
					echo "</div>";
					
				}
				

				echo "<div class='w3-container w3-sand'>
					<form class='w3-container w3-card-4' action='includes/profile.inc.php' method='POST'>
						<input  id='ufname' type='text' name='fname' placeholder='Please enter ur first name' class='w3-input'>
						<input id='ulname' type='text' name='lname' placeholder='Please enter ur last name' class='w3-input'>
						<input id='ubcity' type='text' name='bcity' placeholder='Where a u from?'' class='w3-input'>
						<br>
						<select id='ugender' name='gender' class='w3-select'>
							<option value='male'>Male</option>
							<option value='female'>Female</option>				
						</select>
						<input type='date' name='bday' class='w3-select'>
						<label>Upload your photo:</label><input type='file' name='ufoto' class='w3-select'>
						<br>
						<button type='submit' name='submit-profile' class='w3-button w3-light-gray w3-border'>SAVE</button>
								
					</form>
					</div>";
			}
			else {
				echo '<p>You are logged out!</p>';
			}
		?> 		
		</section>		
	</div>

	
	
</main>

<?php 
require "footer.php"
?>