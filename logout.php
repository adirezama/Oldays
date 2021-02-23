<?php  
 
 	session_start();
 	$_SESSION["id_user"];
 	$_SESSION["username"];

 	session_unset();
 	session_unset();

 	header("location: login.php");
?>