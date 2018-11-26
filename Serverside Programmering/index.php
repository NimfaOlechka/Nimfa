<?php 
require "header.php"
?>

<main>

<?php if($loggedIn):?>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div  id="avatar" class="w3-display-container">
          <img src="upload/profiledefault.png"  style="width:50%" alt="Avatar">
          
        </div>
        <div class="w3-container">
          <p id="firstn"><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>Name:  </p>
          <p id="lastn"><i class="fa fa-id-card fa-fw w3-margin-right w3-large w3-text-teal"></i>Surname: </p>
          <p id="ucity"><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Home city: </p>
          <p id="ubday"><i class="fas fa-birthday-cake fa-fw w3-margin-right w3-large w3-text-teal"></i>Birthday: </p>
          <p><a href="profile.php?">Edit</a></p>

          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Pictures</b></p>
          <p>Adobe Photoshop</p>
          
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Education</b></p>
          <p>School</p>
          
          <p>Institute</p>
          
          <p>Someother info</p>
          
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>MyDiary</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Day one of my day</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>24-11-2018</h6>          
          <p id="demo"></p>
          <p id="demo2"></p>
          
          <hr>
        </div>       
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p>Web Development! All I need to know in one place</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>London Business School</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Current</span></h6>  
          <p>Master Degree</p>
          <hr>
        </div>
        
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
<?php endif;?>

</main>
<script>
$(document). ready(function(){
var xhttp = new XMLHttpRequest();
	var user_obj; 	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status ==200){
			user_obj = this.responseText;
			
			document.getElementById("demo").innerHTML = user_obj;
			user_obj = JSON.parse(user_obj);			
			renderHTML(user_obj);
		}
	};
		xhttp.open("GET",'includes/profilecontent.inc.php',true);
		xhttp.send();

	function renderHTML(data){
		$('#firstn').append(data.userFName);
		$('#lastn').append(data.userLName);
		$('#ucity').append(data.userCity);
		$('#ubday').append(data.userBirthday);
	}

});	
</script>
<script>
//setting avatar
	var xhttp = new XMLHttpRequest();
	var user_ava; 	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status ==200){
			user_ava = this.responseText;
			
			document.getElementById("avatar").innerHTML = user_ava;			
		}
	};
		xhttp.open("GET",'includes/userAvatar.inc.php',true);
		xhttp.send();
</script>

<?php 
require "footer.php"
?>