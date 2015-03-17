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

	$sql = "CREATE TABLE Called(
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		agentname VARCHAR(100) references Agent(username),
		number VARCHAR(100),
		businessname VARCHAR(100),
		address VARCHAR(100) NULL,
		clientname VARCHAR(100) references Client(name),
		pickedup VARCHAR(100) NULL,
		interested VARCHAR(100) NULL,
		appointment VARCHAR(100) NULL,
		lead VARCHAR(100) NULL,
		notes TEXT NULL,
		recordingURL TEXT,
		recordingDuration VARCHAR(100),
		callStatus VARCHAR(100),
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";


	$dropTable = "DROP TABLE Called";


	if ($conn->query($dropTable) === TRUE) {
	    echo "Table Called deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table Called created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

?>