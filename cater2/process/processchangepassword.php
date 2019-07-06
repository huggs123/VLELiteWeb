
<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$updatedpass = $conn->real_escape_string($_POST['passw2']);
	
	$sqlupdate1 = "UPDATE cater_users SET password='$updatedpass' WHERE id='$userid'";
	
	$result = $conn->query($sqlupdate1);
	
	if(!$result){
		echo $conn->error;
	}else{

		header("Location:logoutprocess.php?");
	}
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	

?>
 
