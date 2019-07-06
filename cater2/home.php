<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("connect.php");
	
	
	
	$read = "SELECT * FROM `cater_enrol` INNER JOIN cater_courses ON cater_enrol.course = cater_courses.id WHERE cater_enrol.student = '$userid'";
	
	$result = $conn->query($read);
	
		if(!$result){
		echo $conn->error;
	}
	
	$lookupname = "SELECT * FROM `cater_users` WHERE id='$userid'";
	
	$name = $conn->query($lookupname);
	
		if(!$name){
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
	<link rel="stylesheet" href="css/ui.css">
	

    <title>Learning Zone</title>
	<link rel="icon" type="image/png" href="img/books.png">
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
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="courses.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
         
		  <?php
				
				
				while ($row=$result->fetch_assoc()){
		
				$title_data = $row['title'];
				$id_data = $row['id'];
				
				echo"
				
				<a class='dropdown-item' href='coursedetail.php?id=$id_data'>$title_data</a>
				";
				}
		  
		  ?>
	</div>
       <li class="nav-item">
        <a class="nav-link" href="message.php">Messages</a>
      </li>        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="process/logoutprocess.php">Logout</a>
      </li>
    </ul>
   
  </div>
 
  
</nav>
  
<div class="container-fluid">


  


  <div class="row">
    <div class="col-3">
	<img src='img/books.png' id='logo'/>
    </div>
    <div class="col-9">
		
      <h1 class ='header'>Welcome to your Learning Zone</h1>
	  <?php 
	  
				while ($row=$name->fetch_assoc()){
		
				$first = $row['firstname'];
				$last = $row['lastname'];
	  
	  
				echo"<h1>$first $last</h1>";
				}
?>

</div>
</div>

 	<div class = "home">
	</div>
	<div class = "homepage">
		<a href="profile.php"><h3>Profile Page</h3></a>
	</div>
	
	<div class = "homepage">
		<a href="courses.php"><h3>Courses</h3></a>
	</div>
	
	<div class = "homepage">
		<a href="message.php"><h3>Messages</h3></a>
	</div>
	<div class = "homepage">
	<a href="process/logoutprocess.php"><h3>Logout</h3></a>
	
	</div>
	<div class = "homepage">
	</div>

	

 

  </div>



  
  
  
  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>