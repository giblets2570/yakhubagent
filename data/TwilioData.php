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

	$sql = "CREATE TABLE Twilio(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(100) references Agent(username),
		number VARCHAR(100),
		authtoken VARCHAR(100),
		accountsid VARCHAR(100),
		appid VARCHAR(100),
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";


	$dropTable = "DROP TABLE Twilio";


	if ($conn->query($dropTable) === TRUE) {
	    echo "Table Twilio deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table Twilio created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

?>