<?php

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

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

	$sql = "CREATE TABLE Calling (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		number VARCHAR(100) NOT NULL,
		businessname VARCHAR(100),
		agentname VARCHAR(100) references Agent(username),
		clientname VARCHAR(100) references Client(name),
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";


	$dropTable = "DROP TABLE Calling";


	if ($conn->query($dropTable) === TRUE) {
	    echo "Table Calling deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table Calling created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}