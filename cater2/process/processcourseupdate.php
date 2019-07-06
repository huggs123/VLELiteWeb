<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	include("../connect.php");

	
	$title = $conn->real_escape_string($_POST['title']);
	$tutor = $conn->real_escape_string($_POST['tutor']);
	$courseid = $conn->real_escape_string($_GET['id']);
	

	
	if($tutor=='Select Tutor'){
	
	
	}else{
	$sqlupdate = "UPDATE `cater_courses` SET `tutor`= '$tutor' WHERE `id`='$courseid'";		
	}
	$result = $conn->query($sqlupdate);

	if(!$result)
	{
		echo $conn->error;
	}else{
	

	
	}

	$sqlupdate1 = "UPDATE `cater_courses` SET `title`= '$title' WHERE `id`='$courseid'";	
	
	echo"<p>$sqlupdate1<p>";
	$result1 = $conn->query($sqlupdate1);

	if(!$result1)
	{
		echo $conn->error;
	}

	header("Location: ../admin/editcourse.php");	
	

?>
