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

	$sql = "CREATE TABLE details(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(100),
		email VARCHAR(100),
		phone VARCHAR(100),
		website VARCHAR(100),
		help TEXT,
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";

	$dropTable = "DROP TABLE details";

	if ($conn->query($dropTable) === TRUE) {
	    echo "Table details deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table details created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

?>