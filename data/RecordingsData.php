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

	$sql = "CREATE TABLE Recordings(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		agentname VARCHAR(100) references Agent(username),
		clientname VARCHAR(100),
		numberCalled VARCHAR(100),
		recordingURL TEXT,
		recordingDuration VARCHAR(100),
		callStatus VARCHAR(100),
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";


	$dropTable = "DROP TABLE Recordings";


	if ($conn->query($dropTable) === TRUE) {
	    echo "Table Recordings deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table Recordings created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

?>