<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: ../index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$thisid = $_GET['id'];
	
	
	$read = "SELECT * FROM `cater_courses` WHERE `tutor` = '$userid'";
	
	$result = $conn->query($read);
	
		if(!$result){
		echo $conn->error;
	}	
	
	$read1 = "SELECT cater_users.id, cater_users.firstname, cater_users.lastname FROM `cater_enrol` INNER JOIN `cater_users` ON cater_enrol.student = cater_users.id WHERE `course` = '$thisid'";
	
	$result1 = $conn->query($read1);
	
		if(!$result1){
		echo $conn->error;
		
	}


	$read3 = "SELECT * FROM `cater_courses` WHERE id = '$thisid'";
	
	$result3 = $conn->query($read3);
	
		if(!$result3){
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
  <a class="navbar-brand" href="#">Learning Zone</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="hometutor.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profiletutor.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="coursestutor.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses<span class="sr-only">(current)</span>
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

	  <?php 

	  
	  
	 	while ($row=$result3->fetch_assoc()){
		
				$title_data = $row['title'];
				$desc_data = $row['description'];
				$courseid_data = $row['id'];
	  
     echo"<h1 class ='header'>$title_data</h1>
 
		</div>
	</div>";
			}
	 
	echo"<div>
		<h3 class ='detailshead'>Students Enrolled</h3>
	</div>";
		

		while ($row=$result1->fetch_assoc()){
		
			$stufirst = $row['firstname'];
			$stulast = $row['lastname'];
			$stuid = $row['id'];
			

			
			echo"
			<ul>
			<div><li><a href='profiletutor.php?sendid=$stuid&tut=y'>$stufirst $stulast</a></div>

			
			</ul>";
}			


?>	
	
	</div>
	

 


  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>