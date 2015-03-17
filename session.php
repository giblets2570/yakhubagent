<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter

	include 'vars.php';

	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);
	// Selecting Database

	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}

	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['agent'];
	// SQL Query To Fetch Complete Information Of User

	$ses_sql = $mysqli->query("select username from Agent where username='$user_check'");

	$row = $ses_sql->fetch_assoc();

	$login_session = $row['username'];

	if(!isset($login_session)){
		$mysqli->close(); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>