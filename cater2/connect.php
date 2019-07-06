<?php
$db = "chuggins01";
$pw= "rc1V7ZhhwGwxzv99";
$host="chuggins01.lampt.eeecs.qub.ac.uk";
$user= "chuggins01";
$conn=new mysqli($host,$user,$pw,$db);

if($conn->connect_error){
    echo "Connection failed: ".$conn->connect_error;
}



























