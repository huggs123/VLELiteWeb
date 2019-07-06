<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	

	$subject = $conn->real_escape_string($_POST['messagesubject']);
	$tutor = $conn->real_escape_string($_POST['tutor']);
	$content = $conn->real_escape_string($_POST['message']);
	$messagedate = date("Y-m-d h:i:s");

	
	$sqlinsert = "INSERT INTO `cater_messages`(`sender`, `receiver`, `subject`, `content`, `dateSent`, `meassageRead`) VALUES ('$userid','$tutor','$subject','$content','$messagedate','0')";
	
	
	//echo"<p>$subject</p><p>$tutor</p><p>$content</p><p>$messagedate</p><p>$sqlinsert</p>"
	
	$result = $conn->query($sqlinsert);

	if(!$result)
	{
		echo $conn->error;
	}else{

	header('Location:../message.php');	
	}
	


	
	

?>
