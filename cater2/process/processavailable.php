<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];
	$active=$_GET['active'];
	$updatedcourseid =$_GET['courseid'];
	$materialid=$_GET['material'];

	include("../connect.php");
	
	if($active=='1'){
	$sqlupdate = "UPDATE `cater_coursematerial` SET `active`= '0' WHERE `id`='$materialid'";
	
	}else{
	$sqlupdate = "UPDATE `cater_coursematerial` SET `active`= '1' WHERE `id`='$materialid'";		
	}
	$result = $conn->query($sqlupdate);

	if(!$result)
	{
		echo $conn->error;
}else{
	
	header("Location: ../tutor/coursedetailtutor.php?id=$updatedcourseid");
	
	}

	


	
	

?>
