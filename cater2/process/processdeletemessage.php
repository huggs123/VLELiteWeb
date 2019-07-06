<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$messageid = $conn->real_escape_string($_GET['sendid']);
	

	$sqlupdate = "DELETE FROM `cater_messages` WHERE `id`=$messageid";

	$result = $conn->query($sqlupdate);
	
	if(!$result)
	{
		echo $conn->error;
	}else{

	header("Location:../tutor/messagetutor.php?id=$messageid");
	
	}
	
	
	
	


	
	

?>
