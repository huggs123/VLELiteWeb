<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];

	include("../connect.php");
	
	$courseid = $conn->real_escape_string($_GET['id']);
	$title = $conn->real_escape_string($_GET['coursetitle']);


	$read = "SELECT * FROM `cater_users` WHERE userrights = '3' ORDER BY `lastname`  ASC ";
	
	$result = $conn->query($read);
	
		if(!$result){
		echo $conn->error;
	}		
	
	$read1 = "SELECT DISTINCT cater_users.id, cater_users.firstname, cater_users.lastname FROM `cater_users` INNER JOIN cater_enrol ON cater_users.id = cater_enrol.student WHERE cater_enrol.course !='$courseid' and userrights = '3' ORDER BY `lastname`  ASC";
	
	$result1 = $conn->query($read1);
	
	if(!$result1){
	echo $conn->error;
	}		
	
	$read2 = "SELECT cater_users.id, cater_users.firstname, cater_users.lastname  FROM `cater_enrol` INNER JOIN cater_users ON cater_enrol.student = cater_users.id INNER JOIN cater_courses ON cater_enrol.course = cater_courses.id WHERE cater_courses.id ='$courseid' ORDER BY `lastname`  ASC";
	
	$result2 = $conn->query($read2);
	
	if(!$result2){
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
		
      <h1 class ='header'>Administartion Page</h1>
		<?php
		echo"<h1>$title</h1>";
		
		?>

	</div>
</div>

  <?php echo"
		<form action='../process/addstudentcourse.php?course=$courseid&title=$title' method='post'>
		<label for='validationTooltip01'>Add Students to Course</label>  
		<select class='custom-select' multiple size='10' name ='employee[]'>
			<option selected>Add Students</option>";

  
  				while ($row=$result->fetch_assoc()){
		
				$first = $row['firstname'];
				$last = $row['lastname'];
				$userid = $row['id'];
				
			echo"<option value='$userid'>$first $last</option>";
	

				}
  
  
  ?>
  
  </select>
	<div><button type='Update Info' class='btn btn-outline-dark'>Add Students</button></div>
  </form>
  
  
 <?php 
 	echo"<form action='../process/removestudentcourse.php?course=$courseid'&title=$title method='post'> 
  <label for='validationTooltip01'>Remove Students From Course</label>  
  <select class='custom-select' multiple size='10' name ='employee[]'>
  <option selected>Remove Students</option>";

  				while ($row=$result2->fetch_assoc()){
		
				$first = $row['firstname'];
				$last = $row['lastname'];
				$userid = $row['id'];
				
			echo"<option value='$userid'>$first $last</option>";
	

				}
  
  
  ?>
  
  </select>
	<div><button type='Update Info' class='btn btn-outline-dark'>Remove Students</button></div>	
  </form>
  

  
  </div>
  
  
 

  </div>



  
  
  
  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>