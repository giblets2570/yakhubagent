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

	$sql = "CREATE TABLE Numbers (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		number VARCHAR(100) NOT NULL,
		businessname VARCHAR(100) NOT NULL,
		address VARCHAR(100) NULL,
		website VARCHAR(100) NULL,
		clientname VARCHAR(100) references Client(name),
		called VARCHAR(100) NOT NULL,
		timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";


	$dropTable = "DROP TABLE Numbers";


	if ($conn->query($dropTable) === TRUE) {
	    echo "Table Numbers deleted successfully<br>";
	} else {
	    echo "Error dropping table: " . $conn->error. "<br>";
	}

	if ($conn->query($sql) === TRUE) {
	    echo "Table Numbers created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error. "<br>";
	}

	// $query = "INSERT INTO Numbers (
	// 	id, number, businessname, clientname, called, timeCreated)
	// 		VALUES (NULL,'00447547968608','TestBusiness','TestClient','no',CURRENT_TIMESTAMP)"; 

		// if ($conn->query($query) === TRUE) {
		//     echo "New record created successfully";
		// } else {
		// 	echo "Error: " . $query . "<br>" . $conn->error;
		// }

	// $query = "INSERT INTO Numbers (
	// 	id, number, businessname, clientname, called, timeCreated)
	// 		VALUES (NULL,'00447547968608','TestBusiness','TestClient','no',CURRENT_TIMESTAMP)"; 

	// 	if ($conn->query($query) === TRUE) {
	// 	    echo "New record created successfully";
	// 	} else {
	// 		echo "Error: " . $query . "<br>" . $conn->error;
	// 	}

	// $query = "INSERT INTO Numbers (
	// 	id, number, businessname, clientname, called, timeCreated)
	// 		VALUES (NULL,'00447547968608','TestBusiness','TestClient','no',CURRENT_TIMESTAMP)"; 

	// 	if ($conn->query($query) === TRUE) {
	// 	    echo "New record created successfully";
	// 	} else {
	// 		echo "Error: " . $query . "<br>" . $conn->error;
	// 	}

	// $query = "INSERT INTO Numbers (
	// 	id, number, businessname, clientname, called, timeCreated)
	// 		VALUES (NULL,'00447547968608','TestBusiness','TestClient','no',CURRENT_TIMESTAMP)"; 

	// 	if ($conn->query($query) === TRUE) {
	// 	    echo "New record created successfully";
	// 	} else {
	// 		echo "Error: " . $query . "<br>" . $conn->error;
	// 	}

	// $query = "INSERT INTO Numbers (
	// 	id, number, businessname, clientname, called, timeCreated)
	// 		VALUES (NULL,'00447547968608','TestBusiness','TestClient','no',CURRENT_TIMESTAMP)"; 

	// 	if ($conn->query($query) === TRUE) {
	// 	    echo "New record created successfully";
	// 	} else {
	// 		echo "Error: " . $query . "<br>" . $conn->error;
	// 	}
	// $query = "INSERT INTO Numbers (
	// 	id, number, businessname, clientname, called, timeCreated)
	// 		VALUES (NULL,'00447547968608','TestBusiness','TestClient','no',CURRENT_TIMESTAMP)"; 

	// 	if ($conn->query($query) === TRUE) {
	// 	    echo "New record created successfully";
	// 	} else {
	// 		echo "Error: " . $query . "<br>" . $conn->error;
	// 	}

?>