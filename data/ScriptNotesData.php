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

	$sql = "CREATE TABLE ScriptNotes(
		agentname VARCHAR(100) references Agent(username),
		clientname VARCHAR(100) references Client(name),
		scriptNotes TEXT NULL,
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";


	$dropTable = "DROP TABLE ScriptNotes";


	if ($conn->query($dropTable) === TRUE) {
	    echo "Table ScriptNotes deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table ScriptNotes created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

?>