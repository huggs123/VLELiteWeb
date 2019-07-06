
<?php

session_start();
	

	include("../connect.php");
	
	$user = $conn->real_escape_string($_POST['username']);
	$last = $conn->real_escape_string($_POST['lastname']);
	$match = "false";
	
	$read = "SELECT `id`, `Username`,`lastname`FROM `cater_users`";
	
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;
	}else{
		
		while ($row=$result->fetch_assoc()){	
		
				
				$userid = $row['id'];
				$lastn = $row['lastname'];
				$username = $row['Username'];
				

				
				
				if($user==$username && $last==$lastn){
				$match = $userid;
				
}

		
		}
	}
	
	if ($match == 'false'){
			header("Location:../index.php?");
	}else{
			$_SESSION['40221503_userid'] = $match;		
			header("Location:../changepassword.php?");
	}
	
	
	
	
	
	
	
	
	
	

?>
 
