<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "congcu";
	$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $db )or die( "Connect failed: %s\n" . $conn->error );
	mysqli_query( $con, "SET NAMES 'utf8'" );
?>