<?php

session_start();
	
	if(!isset($_SESSION['40221503_userid'])){
		header("location: index.php");
	}
	
	$userid = $_SESSION['40221503_userid'];
	

?>
 
<!DOCTYPE html>
<html lang="en">
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <title>Learning Zone</title>
	<link rel="icon" type="image/png" href="img/books.png">
  </head>
  <body>
  
<div class="container-fluid">

<div class="row">
    <div class="col-3">
	<img src='img/books.png' id='logo'/>
    </div>
    <div class="col-9">
		
      <h1 class ='header'>Welcome to the Learning Zone</h1>
	  <h1>Change Password<h1>


</div>
 </div>
 
 <script>
 $(function(){
	 
	 console.log('jquery engine loaded');
	
	
	$('form').submit(function(e){
		 var pass1 = $("#Password1").val();
		 var pass2 = $("#Password2").val();
		 
		 	 console.log(pass1);
			 console.log(pass2);
		 
		 if(pass1 != pass2){
			 e.preventDefault();
			alert('Passwords do not match');
		 }else{
			alert('Password Updated, please login again');
		 }
		 
		 
	 });

 
 });
 
 </script>

<form action ='process/processchangepassword.php' method='POST'>
  <div class="form-group">
    <label>New Password</label>
	
    <input type="password" class="form-control" id="Password1" placeholder="Password" name = "passw1">
  </div>
  <div class="form-group">
    <label>Re-enter Password</label>
   
	<input type="password" class="form-control" id="Password2" placeholder="Password" name = "passw2">
  </div>
 <div id='feedback'><div>
  <button type="submit" class="btn btn-primary">Change Password</button>
</form>



</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>