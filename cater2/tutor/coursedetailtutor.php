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
	
	$read1 = "SELECT cater_coursematerial.id, cater_coursematerial.description, cater_coursematerial.location, cater_coursematerial.active FROM `cater_coursematerial` INNER JOIN cater_courses ON cater_coursematerial.course = cater_courses.id WHERE cater_courses.id = '$thisid'";
	
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
	  
		<div class='coursebutton'>
			<a href='studentsenrolled.php?id=$thisid' role='button' class='btn btn-outline-dark'>View Students Enrolled</a>
	  
		</div>
	  
			<div>
				<form method='POST' action='../process/processcoursedescription.php' enctype='multipart/form-data'>			
					<div class='form-group'>
						<label><b>Edit Course Description</b></label>
						<textarea name = 'coursedescription' class='form-control' rows='6'>$desc_data</textarea>
						<input type='hidden' name='courseid' value='$courseid_data'>
					</div>
					
						<button type='Update Info' class='btn btn-outline-dark'>Update Course Description</button>
				</form>
				
			</div>
		</div>
	</div>";}
	 
	echo"<div>
		<h3 class ='detailshead'>Update Your Course Materials</h3>
	</div>";
		

		while ($row=$result1->fetch_assoc()){

		$descriptionmaterial = $row['description'];
		$locationmaterial = $row['location'];
		$courseactive = $row['active'];
		$materialid = $row['id'];
			
	echo"<div class='row coursedownload'>
			<div class='col-8'>
				$descriptionmaterial
			</div>
				
			<div class='col-4'>
				<div>
					<div class = 'coursebutton'><a href='../uploaddoc/$locationmaterial' role='button' class='btn btn-outline-dark' download target='_blank'>Download</a></div>
					<div class = 'coursebutton'><a href='../process/processdelete.php?material=$materialid' role='button' class='btn btn-outline-dark'>Delete</a></div>
						<div class = 'coursebutton'>";
				
							if($courseactive=='1'){
								echo"<a href='../process/processavailable.php?active=$courseactive&courseid=$thisid&material=$materialid' role='button' class='btn btn-outline-dark'>Available</a>";
							}else{
								echo"<a href='../process/processavailable.php?active=$courseactive&courseid=$thisid&material=$materialid' role='button' class='btn btn-outline-dark'>Not Available</a>";	
							}
				
						echo"</div>
				</div>
			</div>
		</div>";}
?>



		<div class='form-group detailshead'>
			<form method='POST' action='../process/processupload.php' enctype='multipart/form-data'>				
			<label class ='detailshead'><b>Upload new course material</b></label>
				<div class="form-group detailshead">
					<label for="formGroupExampleInput">Document Name</label>
					<input type="text" class="form-control" name='documentname' placeholder="Description">
					<?php	echo"	<input type='hidden' name='courseid' value='$thisid'>"; ?>
					<input name='uploadoc' type='file' class='form-control-file coursebutton'>
					<div class='coursebutton'><button type='Update Info' class='btn btn-outline-dark coursebutton'>Upload Document</button></div>
				</div>
			</form>
		</div>

  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>