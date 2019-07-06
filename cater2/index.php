<?php

session_start();

    include("connect.php");
	
	

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


</div>
 </div>

<form action ='process/loginprocess.php' method='POST'>
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" placeholder="Enter username" name = "usern">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name = "passw">
  </div>
  <div>
	<a href="forgot.php"><p>forgot password</p></a>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

if(isset($_GET['flag'])){
		
	$flag = $_GET['flag'];	
		
	if($flag==1){	
	echo"<script>

	alert('Incorrect username or password entered');
	
	</script>";

	}else{
	echo"<script>
	

	alert('Logout Successful');
	
	</script>";	
		
	}
}
  
 ?>
  
  
  
  
  
  
</div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>