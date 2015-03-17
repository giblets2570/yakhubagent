<?php

	include 'vars.php';

	// Create connection
	$conn = new mysqli($servername, $serverusername, $serverpassword, $db);

	// Check connection
	if ($conn->connect_error) {
		echo "nonono";
	    die("Connection failed: " . $conn->connect_error);
	}
	else {
		echo "Connected successfully";
		echo "yes to amazon web services";	
	}

	$username="TomMurray"; 
	$password="bogaboga123"; 
	$email="tomkeohanemurray@gmail.com";

	$sql = "INSERT INTO Agent (username,email,password,timeCreated)
	VALUES ('$username','$email','$password',CURRENT_TIMESTAMP)"; 

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>