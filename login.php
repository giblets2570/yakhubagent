<?php
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	include 'vars.php';

	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		} else {

			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			

			$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

			if ($mysqli->connect_errno) {
			    printf("Connect failed: %s\n", $mysqli->connect_error);
			    exit();
			}

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			// SQL query to fetch information of registerd users and finds user match.
			$query = $mysqli->query("select * from Agent where password='$password' AND username='$username'");
			$rows = $query->num_rows;
			if ($rows == 1) {
				$_SESSION['agent']=$username; // Initializing Session

				header("location: profile.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
			}
			$mysqli->close(); // Closing Connection
		}
	}
?>