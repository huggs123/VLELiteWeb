<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	

	$title = $conn->real_escape_string($_POST['title']);
	$firstname = $conn->real_escape_string($_POST['first']);
	$lastname = $conn->real_escape_string($_POST['last']);
	$userrights = $conn->real_escape_string($_POST['user']);
	$password = $conn->real_escape_string($_POST['password']);
	$username = $conn->real_escape_string($_POST['username']);

	
	$sqlinsert = "INSERT INTO `cater_users`(`Username`, `title`, `firstname`, `lastname`, `userrights`, `profilepic`, `password`) VALUES ('$username', '$title','$firstname','$lastname','$userrights','default.jpeg','$password')";
	
	$result = $conn->query($sqlinsert);

	if(!$result)
	{
		echo $conn->error;
	}else{
	header('Location: ../admin/newuser.php');	
	}
	


	
	

?>
