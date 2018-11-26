<?php
include 'includes/dbh1.inc.php';
include 'includes/user.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
# in comments a code for dbh.inc n getuser.php
#$users = new ViewUser();
#$users->showAllUsers();
#print_r(PDO::getAvailableDrivers());
#$object = new DBC();
#$object->connect();
$object = new User();
$object->getAllUsers();
echo $object->getUsersCC();

 ?>

</body>
</html>