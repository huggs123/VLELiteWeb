<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$updatedEmail = $conn->real_escape_string($_POST['newemail']);
	$updatedPhone = $conn->real_escape_string($_POST['newphone']);
	$updatedDescription = $conn->real_escape_string($_POST['description']);
	
	echo"<p>$updatedEmail</p>";
	echo"<p>$updatedPhone</p>";
	echo"<p>$updatedDescription</p>";
	
	if ($updatedEmail != ""){
	
	$sqlupdate1 = "UPDATE `cater_users` SET `contactemail` = '$updatedEmail' WHERE id = '$userid'";
	
	$result1 = $conn->query($sqlupdate1);

	if(!$result1)
	{
		echo $conn->error;
	}else{
	$emailup = '1';
	}
	
	}
	
	if ($updatedPhone != ""){
	
	$sqlupdate2 = "UPDATE `cater_users` SET `telephonenumber` = '$updatedPhone' WHERE id = '$userid'";
	
	$result2 = $conn->query($sqlupdate2);

	if(!$result2)
	{
		echo $conn->error;
	}else{
	$teleup = '1';
	}
	
	}	
	
	$sqlupdate3 = "UPDATE `cater_users` SET `description` = '$updatedDescription' WHERE id = '$userid'";

	$result3 = $conn->query($sqlupdate3);
	
	if(!$result3)
	{
		echo $conn->error;
	}else{
	$descup = '1';
	}
	
	
	
	
	$upload = $_FILES['uploadpic']['name'];
	$location = $_FILES['uploadpic']['tmp_name'];
	
	if($upload != ""){

	
	$move=move_uploaded_file($location,"../uploadpics/$upload");
	
	$sqlupdate = "UPDATE `cater_users` SET `profilepic`='$upload' WHERE id = '$userid'" ;

	$result = $conn->query($sqlupdate);

	if(!$result)
	{
		echo $conn->error;
	}else{
	$picup ='1';
	}	
	}
	header('Location: ../profile.php');
	
	

?>
