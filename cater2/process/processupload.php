<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$updatedDescription = $conn->real_escape_string($_POST['documentname']);
	$courseID = $conn->real_escape_string($_POST['courseid']);
	$upload = $_FILES['uploadoc']['name'];
	$location = $_FILES['uploadoc']['tmp_name'];
	
	$move=move_uploaded_file($location,"../uploaddoc/$upload");
	
	$sqlinsert = "INSERT INTO `cater_coursematerial`(`course`, `description`, `location`, `active`) VALUES ('$courseID','$updatedDescription','$upload','0')" ;

	$result = $conn->query($sqlinsert);

	if(!$result)
	{
		echo $conn->error;
		
	}
	header("Location: ../tutor/coursedetailtutor.php?id=$courseID");
	
	echo"$sqlinsert";

?>
