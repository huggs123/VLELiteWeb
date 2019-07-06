<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	
	$read = "SELECT * FROM `cater_title`";
	
	$result = $conn->query($read);
	
		if(!$result){
		echo $conn->error;
	}	
	
	$read1 = "SELECT * FROM `cater_userrights`";
	
	$result1 = $conn->query($read1);
	
		if(!$result1){
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
		
      <h1 class ='header'>Add User</h1>
	  
  	<form method='POST' action='../process/processnewuser.php' enctype='multipart/form-data'>
	</div>
	</div>
		
	<div class="form-row">
	<div class="col-md-4 mb-3">

	 <label for="validationTooltip01">Title</label>
	<select class="custom-select" name='title'>

			<option selected>Select Title</option>		
		
		<?php
				
				
				while ($row=$result->fetch_assoc()){
		
				$title_data = $row['title'];
				$id_data = $row['id'];
				
				echo"
					
					<option  value='$id_data'>$title_data</option>				

				";
				}
		  
		 ?>
		</select>
		</div>
		
			<div class="col-md-4 mb-3">
			  <label for="validationTooltip01">First name</label>
			  <input name='first' type="text" class="form-control" placeholder="First name" value="" required>

			</div>
			<div class="col-md-4 mb-3">
			  <label for="validationTooltip02">Last name</label>
			  <input name='last' type="text" class="form-control"  placeholder="Last name" value="" required>

			</div>	


		
			</div>
			<div class="row">

			
			<div class="col-md-4 mb-3">			
			<label for="validationTooltip01">User Level</label>
			<select class="custom-select"  name='user'>

			<option selected>Select User Level</option>		
		
		<?php
				
				
				while ($row=$result1->fetch_assoc()){
		
				$title_data = $row['userlevel'];
				$id_data = $row['id'];
				
				echo"
					
					<option value='$id_data'>$title_data</option>				

				";
				}
		  
		 ?>
		</select>			
			
			
			</div>			
			<div class="col-md-4 mb-3">
			<label for="validationTooltip02">Username</label>
			<input name='username' type="text" class="form-control"  placeholder="Username" value="" required>
			  


			</div>
			
			
			<div class="col-md-4 mb-3">
			<label for="validationTooltip02">Password</label>
			<input name='password' type="text" class="form-control"  placeholder="Password" value="" required>
			  


			</div>

			</div>
			<div>
						<button type='Update Info' class='btn btn-outline-dark'>Add User</button>
			</div>
		
	  
		</form>
	  
	  
	  
	  
	  
	  






  
  
  
  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>