<?php

	include 'vars.php';

	// Create connection
	$conn = new mysqli($servername, $serverusername, $serverpassword,$db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	else {
		echo "yes to amazon web services<br>";	
	}

	$sql = "CREATE TABLE Agent (
		username VARCHAR(100) NOT NULL PRIMARY KEY,
		email VARCHAR(100) NOT NULL,
		password VARCHAR(100) NOT NULL,
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";


	$dropTable = "DROP TABLE Agent";


	if ($conn->query($dropTable) === TRUE) {
	    echo "Table Agent deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table Agent created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

?>