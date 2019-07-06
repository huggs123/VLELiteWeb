<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("connect.php");
	
	$thisid = $_GET['id'];
	
	
	$read = "SELECT * FROM `cater_enrol` INNER JOIN cater_courses ON cater_enrol.course = cater_courses.id WHERE cater_enrol.student = '$userid'";
	
	$result = $conn->query($read);
	
		if(!$result){
		echo $conn->error;
	}	
	
	$read1 = "SELECT cater_coursematerial.description, cater_coursematerial.location, cater_coursematerial.active FROM `cater_coursematerial` INNER JOIN cater_courses ON cater_coursematerial.course = cater_courses.id WHERE cater_courses.id = '$thisid'";
	
	$result1 = $conn->query($read1);
	
		if(!$result1){
		echo $conn->error;
		
	}

	$read2 = "SELECT cater_users.id, cater_users.firstname, cater_users.lastname, cater_users.profilepic FROM `cater_courses` INNER JOIN cater_users ON cater_courses.tutor = cater_users.id WHERE cater_courses.id = '$thisid' ";
	
	$result2 = $conn->query($read2);
	
		if(!$result2){
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
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="courses.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses<span class="sr-only">(current)</span>
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
    <div class="col-6">

	  <?php 

	 	while ($row=$result3->fetch_assoc()){
		
				$title_data = $row['title'];
				$desc_data = $row['description'];
	  
     echo"<h1 class ='header'>$title_data</h1>
			
			<div>
			<p>$desc_data</p>
			</div>";
			}
	 
	 echo"<div>
			<h3>Course Materials</h3>
			</div>
			</div>
		<div class='col-3'>";
		
		
		while ($row=$result2->fetch_assoc()){
		
		$tutfirst = $row['firstname'];
		$tutlast = $row['lastname'];
		$tutpic = $row['profilepic'];
		$tutid = $row['id'];
			
			echo "
			<div class ='header'>
			<a href='profile.php?selectid=$tutid'><img src='uploadpics/$tutpic' id='coursepic' class='rounded mx-auto d-block img-fluid' alt='No Pic Added'><a>
			</div>
			<div class ='text-center'><a href='profile.php?selectid=$tutid'><p>$tutfirst $tutlast</p></a></div>";
				}	

				
		
		
		echo"
		
		</div>
		</div>";
		
			
			
			
			
			
			
			
			
			
			
			
				while ($row=$result1->fetch_assoc()){
		
				$descriptionmaterial = $row['description'];
				$locationmaterial = $row['location'];
				$avail = $row['active'];
			
			if($avail==1){
			
			echo"
			<div class='row coursedownload'>
			<div class='col-8'>
			
			$descriptionmaterial
			
			</div>
			
			
			<div class='col-4'>
			

			<div class ='text-left'>
			<a href='uploaddoc/$locationmaterial' role='button' class='btn btn-outline-dark' download target='_blank'>Download</a>
			</div>
			</div>
			</div>";
				}				
				}

?>

</div>
</div>



	

 

  </div>



  
  
  
  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>