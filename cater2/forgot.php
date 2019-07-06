<?php

	include("connect.php");
	
	$read = "SELECT `id`, `Username`,`lastname`FROM `cater_users`";
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;
	}

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
	  <h1>Fogot Password<h1>


</div>
 </div>
 
 <script>
 $(function(){
	 
	 console.log('jquery engine loaded');
	
	
	$('form').submit(function(e){
		 var user = $("#username").val();
			user=jQuery.trim(user);
		 var last = $("#lastname").val();
			last=jQuery.trim(last);

		 
				if(user.length <= 0 ) 
					{
                        e.preventDefault(); 
						alert('Please fill in Username`');
                        }
			
				if(last.length <= 0 ) 
					{
						e.preventDefault();
						console.log('form NOT submitted');
						alert('Please fill in lastname`');
					}
		 
		 
	 });

 
 });
 
 </script>

<form action ='process/processforgot.php' method='POST'>
  <div class="form-group">
    <label>Please enter your username</label>
	
    <input type="text" class="form-control" id="username" placeholder="username" name = "username">
  </div>
  <div class="form-group">
    <label>Please enter your lastname</label>
   
	<input type="text" class="form-control" id="lastname" placeholder="lastname" name = "lastname">
  </div>
 <div id='feedback'><div>
  <button type="submit" class="btn btn-primary">Reset Password</button>
</form>



</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>