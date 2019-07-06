<?php
include('../connect.php');


	$courseid = $_GET['course'];
	$title = $_GET['title'];
	foreach($_POST['employee'] as $newStudent){
	
	$sqldelete = "DELETE FROM `cater_enrol` WHERE `course`= '$courseid' AND`student` = $newStudent";
	

	
	$result = $conn->query($sqldelete);
		}
	if(!$result)
	{
		echo $conn->error;
	}
	


	


	header("Location: ../admin/studentenrol.php?id=$courseid&coursetitle=$title&flag=1");
		
		?>