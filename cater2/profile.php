<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}

	$userid = $_SESSION['40221503_userid'];
	
	if (isset($_GET['selectid'])){
		$profileid = $_GET['selectid'];
	}else{
		$profileid = $_SESSION['40221503_userid'];
	}

	include("connect.php");
	
	
	
	
	$read = "SELECT * FROM `cater_enrol` INNER JOIN cater_courses ON cater_enrol.course = cater_courses.id WHERE cater_enrol.student = '$userid'";
	
	$result = $conn->query($read);
	
		if(!$result){
		echo $conn->error;
	}
	
	$lookupname = "SELECT * FROM `cater_users` WHERE id='$profileid'";
	
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
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
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
		
      <h1 class ='header'>Profile Page</h1>


	</div>
	</div>






<?php
  
  
				while ($row=$name->fetch_assoc()){	
		
				$first = $row['firstname'];
				$last = $row['lastname'];
				$email = $row['contactemail'];
				$tele = $row['telephonenumber'];
				$desc = $row['description'];
				$pic = $row['profilepic'];
				$profileid = $row['id'];
  
  
  
  echo"
   <div class='row'>
    <div class='col-8'>
	
	<p class='profileheading'><b>Name:</b> $first $last</p>
	<p class='profileheading'><b>E-mail:</b> <a href='mailto:$email'>$email</a></p>
	<p class='profileheading'><b>Phone:</b> $tele</p>

	</div>
    
	
	
	<div class='col-4'>
	
	<img src='uploadpics/$pic' id='profilepic' class='rounded mx-auto d-block img-fluid' alt='No Pic Added'>

	
	
		<div class ='text-center'>
		<p></p>";
		
		if($userid!=$profileid){
			echo" <a href='messagesend.php?sendid=$profileid' role='button' class='btn btn-outline-dark'>Send Message</a>"
	
	;
			
			
		}else{
	echo" <a href='changepassword.php' role='button' class='btn btn-outline-dark'>Change Password</a>
	
		<p></p>
		<a href='editprofile.php' role='button' class='btn btn-outline-dark'>Edit Profile</a></a>";
		}


	echo"
	</div>
  </div>
  
  <div><h3 class='profileheading'><b>Personal Description</b></h3>
  <p class ='profileheading'>$desc</p>
  
 
 
 ";
				
			

				}
	?>







 	
	

 

 



  
  
  
  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>