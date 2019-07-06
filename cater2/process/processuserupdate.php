<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	include("../connect.php");

	
	$first = $conn->real_escape_string($_POST['first']);
	$last = $conn->real_escape_string($_POST['last']);
	$pass = $conn->real_escape_string($_POST['pass']);
	$userlevel = $conn->real_escape_string($_POST['userlevel']);
	$userid = $conn->real_escape_string($_GET['id']);	

	
	if(!isset($tutor)){
		$sqlupdate = "UPDATE `cater_users` SET `userrights`= '$userlevel' WHERE `id`='$userid'";		
	echo"<p>$sqlupdate</p>";
	
	}else{

	
	}
	$result = $conn->query($sqlupdate);

	if(!$result)
	{
		echo $conn->error;
	}else{
	
	}
	
	
	if($pass==''){
	
	
	}else{
	$sqlupdate1 = "UPDATE `cater_users` SET `password`= '$pass' WHERE `id`='$userid'";		
		echo"<p>$sqlupdate1</p>";
	}
	$result = $conn->query($sqlupdate1);

	if(!$result)
	{
		echo $conn->error;
	}else{
	
	}

	$sqlupdate2 = "UPDATE `cater_users` SET `firstname`= '$first', `lastname` = '$last' WHERE `id`='$userid'";	
	

	$result1 = $conn->query($sqlupdate2);
	echo"<p>$sqlupdate2</p>";
	if(!$result1)
	{
		echo $conn->error;
	}

	header("Location: ../admin/edituser.php");	
	

?>
