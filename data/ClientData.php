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

	$sql = "CREATE TABLE Client(
		name VARCHAR(100) NOT NULL PRIMARY KEY,
		email VARCHAR(100) NOT NULL,
		password VARCHAR(100) NOT NULL,
		website VARCHAR(100) NOT NULL,
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";

	$dropTable = "DROP TABLE Client";

	if ($conn->query($dropTable) === TRUE) {
	    echo "Table Client deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table Client created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

?>