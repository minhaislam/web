<?php

session_start();
if(isset($_SESSION['uname'])){

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body align="center">
	
		<h1>Welcome <?= $_SESSION['uname']?> </h1>
		
		<a href="profile.php">Profile</a><br>
		<a href="Changepass.php">Change Password</a><br>
		<a href="viewinfo.php">View Info</a><br>
		<a href="logout.php">Logout</a><br>
		

</body>
</html>

<?php
}
else{
	header('location:signin.php');
}
?>
