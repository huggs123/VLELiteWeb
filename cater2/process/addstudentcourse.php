<?php
include('../connect.php');


	$courseid = $_GET['course'];
	$title = $_GET['title'];
	foreach($_POST['employee'] as $newStudent){
	
	$sqlinsert = "INSERT INTO `cater_enrol`(`course`, `student`) VALUES ('$courseid','$newStudent')";
	
	
	
	$result = $conn->query($sqlinsert);
}
	if(!$result)
	{
		echo $conn->error;
	}
	

	




	header("Location: ../admin/studentenrol.php?id=$courseid&coursetitle=$title&flag=1");
		
		?>