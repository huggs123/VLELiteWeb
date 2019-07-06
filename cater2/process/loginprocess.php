<?php

	session_start();

	include("../connect.php");
	
		$name = $conn->real_escape_string($_POST['usern']);
		$pass = $conn->real_escape_string($_POST['passw']);
	
		$loginsql = "SELECT * FROM `cater_users` WHERE `Username`='$name' AND `password`='$pass'";
		$result = $conn->query($loginsql);


		
	if(!$result){
		echo $conn->error;
	}
	
		$num = $result->num_rows;

	if($num > 0) {
		
		
			while ($row=$result->fetch_assoc()){
		
				$lastlogin_data = $row['currentlogin'];
				$logindate = date("Y-m-d h:i:s");
				$id_data = $row['id'];
				$rights = $row['userrights'];
				
		
				$updateloginsql = "UPDATE cater_users SET currentlogin = '$logindate',lastlogin = '$lastlogin_data' WHERE id = '$id_data'";
		
				$update = $conn->query($updateloginsql);
	
					if(!$update){
						echo $conn->error;
					}
			$_SESSION['40221503_login'] = $lastlogin_data;
		
		if($rights==3){
		
						$_SESSION['40221503_userid'] = $id_data;
						header('Location:../home.php');
					
			}
			
			
				if($rights==2){
	
					
						$_SESSION['40221503_userid'] = $id_data;
						header('Location:../tutor/hometutor.php');
					
			}
			
				if($rights==1){
		

						$_SESSION['40221503_userid'] = $id_data;
						header('Location:../admin/homeadmin.php');
					
					
				}
				
			
	}
	
	
	}else{
		
		header("Location:../index.php?flag=1");
	}
	
	
	
	

			
	
	
	
	
	
	
	
	
	
	
	

?>
 
