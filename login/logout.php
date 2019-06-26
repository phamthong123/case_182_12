<?php 
	ob_start();
	ob_start();
	session_start();
	session_destroy(); 
	unset($_SESSION['username']);
	header("location:login.php")
?>