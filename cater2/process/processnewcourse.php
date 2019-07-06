<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	

	$coursetitle = $conn->real_escape_string($_POST['name']);
	$tutor = $conn->real_escape_string($_POST['tutor']);
	$description = $conn->real_escape_string($_POST['description']);


	
	$sqlinsert = "INSERT INTO `cater_courses`(`title`, `tutor`, `description`) VALUES ('$coursetitle','$tutor','$description')";
	
	$result = $conn->query($sqlinsert);

	if(!$result)
	{
		echo $conn->error;
	}else{
	header('Location: ../admin/newcourse.php');	
	}
	


	
	

?>
