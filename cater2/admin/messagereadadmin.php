<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: ../index.php");
	}
	
	$messid = $_GET['messageid'];
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$upadteread = "UPDATE `cater_messages` SET `meassageRead`='1' WHERE `id` = $messid";
	
		$updateresult = $conn->query($upadteread);
	
		if(!$updateresult){
		echo $conn->error;
	}
	
	
	$read = "SELECT cater_messages.id, cater_users.firstname, cater_users.lastname, cater_messages.subject, cater_messages.content, cater_messages.dateSent, cater_messages.meassageRead FROM `cater_messages` INNER JOIN cater_users on cater_messages.sender = cater_users.id WHERE cater_messages.id='$messid'";
	
	$messages = $conn->query($read);
	
		if(!$messages){
		echo $conn->error;
	}	
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/ui.css">
	

    <title>Learning Zone</title>
	<link rel="icon" type="image/png" href="../img/books.png">
  </head>
  <body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Learning Zone Admin Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homeadmin.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newuser.php"> Add New User</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="edituser.php">Edit Users</a>
      </li>	  
      <li class="nav-item">
        <a class="nav-link" href="newcourse.php">Add New Course</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="editcourse.php">Edit Courses</a>
      </li>

	  <li class="nav-item">
        <a class="nav-link" href="studentenrol.php">Student Enrolment</a>
      </li>	

	  <li class="nav-item">
        <a class="nav-link" href="messageadmin.php">Messages</a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="../process/logoutprocess.php">Logout</a>
      </li>
    </ul>
   
  </div>
 
  
</nav>
  
<div class="container-fluid">


  


	<div class="row">
		<div class="col-3">
			<img src='../img/books.png' id='logo'/>
		</div>
		
		<div class="col-9">
			<h1 class ='header'>Messages</h1>
		</div>
	</div>


	<?php
	
		while ($row=$messages->fetch_assoc()){

			$subject = $row['subject'];
			$date = $row['dateSent'];  
			$first = $row['firstname'];
			$last = $row['lastname'];
			$message = $row['content'];
				
		echo"

		<div> <p><b>From:</b> $first $last <p>
			<p><b>Received:</b> $first $last <p>
			<p><b>Received:</b> $subject <p>
		</div>
			
		<div><p><b>Message</b></div>
		<div><p>$message<p></div>";
		}



	echo"
  <div class = 'coursebutton'><a href='messageadmin.php' role='button' class='btn btn-outline-dark'>Back</a></div>
  <div class = 'coursebutton'><a href='../process/processdeletemessage.php?sendid=$messid' role='button' class='btn btn-outline-dark'>Delete Message</a></div>";
	
?>

  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>