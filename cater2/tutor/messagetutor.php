<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: ../index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];
	$logindate=$_SESSION['40221503_login'];
	
	include("../connect.php");
	
	
	
	$read = "SELECT * FROM `cater_courses` WHERE `tutor` = '$userid'";
	
	$result = $conn->query($read);
	
		if(!$result){
		echo $conn->error;
	}


	
	$read = "	SELECT cater_messages.id, cater_users.firstname, cater_users.lastname, cater_messages.subject, cater_messages.content, cater_messages.dateSent, cater_messages.meassageRead FROM `cater_messages` INNER JOIN cater_users on cater_messages.sender = cater_users.id WHERE `receiver`='$userid' ORDER BY `cater_messages`.`dateSent` DESC ";
	
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>		

    <title>Learning Zone</title>
	<link rel="icon" type="image/png" href="../img/books.png">
  </head>
  <body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Learning Zone</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="hometutor.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profiletutor.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="coursestutor.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
         
		  <?php
				
				
				while ($row=$result->fetch_assoc()){
		
				$title_data = $row['title'];
				$id_data = $row['id'];
				
				echo"
				
				<a class='dropdown-item' href='coursedetailtutor.php?id=$id_data'>$title_data</a>
				";
				}
		  
		  ?>
	</div>
       <li class="nav-item">
        <a class="nav-link" href="messagetutor.php">Messages <span class="sr-only">(current)</span></a>
      </li>          
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
	<div><a href='messagesendtutor.php' role='button' class='btn btn-outline-dark'>Send New Message</a></div>

</div>
</div>
				  <div class='row'>
						<div class='col-3'>
							<h3>Sender</h3>
						</div>
				<div class='col-6'>
							<h3>Subject</h3>
						</div>
				<div class='col-3'>
							<h3>Date</h3>
						</div>
				
				</div>
				


	<?php
	
			while ($row=$messages->fetch_assoc()){

				$subject = $row['subject'];
				$date = $row['dateSent'];
				$first = $row['firstname'];
				$last = $row['lastname'];
				$messageid = $row['id'];
				$dateformat=date( 'd M Y', strtotime( $date ));
				
				
				if($date>$logindate){
					$new='(NEW MESSAGE)';
				}else{
					$new='';
				}
					

				echo"
					<script>
					$( document ).ready(function() {
					$('.boldread').css({ 'font-weight': 'bold' });
					});
					</script>";
				
				if($read != 1){		
			echo"
				
				
				  <a href='messagereadtutor.php?messageid=$messageid' class='boldread'><div class='row'>
						<div class='col-3'>
							<div>$first $last</div>
						</div>
				<div class='col-6'>
							<div>$subject</div>
						</div>
				<div class='col-3'>
							<div>$dateformat</div>
						</div>
				</div></a>
			
			";
			}else{
			echo"
				
				
				  <a href='messagereadtutor.php?messageid=$messageid'><div class='row'>
						<div class='col-3'>
							<div>$first $last</div>
						</div>
				<div class='col-6'>
							<div>$subject</div>
						</div>
				<div class='col-3'>
							<div>$dateformat</div>
						</div>
				</div></a>";			
				
			}
			}

?>		

	

	

 




  
  
  
  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>