<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$updatedDescription = $conn->real_escape_string($_POST['coursedescription']);
	$updatedcourseid = $conn->real_escape_string($_POST['courseid']);
	
	echo"<p>$updatedDescription</p>";
	

	$sqlupdate = "UPDATE `cater_courses` SET `description` = '$updatedDescription' WHERE `id`='$updatedcourseid'";

	$result = $conn->query($sqlupdate);
	
	if(!$result)
	{
		echo $conn->error;
	}else{
	
	header("Location: ../tutor/coursedetailtutor.php?id=$updatedcourseid");
	
	}
	
	
	
	


	
	

?>
