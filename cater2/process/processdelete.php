<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$materialid = $conn->real_escape_string($_GET['material']);
	

	$sqlupdate = "DELETE FROM `cater_coursematerial` WHERE`id`='$materialid'";

	$result = $conn->query($sqlupdate);
	
	if(!$result)
	{
		echo $conn->error;
	}else{

	header("Location:../tutor/coursedetailtutor.php?id=$materialid");
	
	}
	
	
	
	


	
	

?>
