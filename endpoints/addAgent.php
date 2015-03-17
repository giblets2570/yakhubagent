<?php
    include('../session.php');
    include 'vars.php';

    if($_SESSION['agent'] != "TomMurray"){
    	echo "Unable to create user";
    }else{

		

		// Create connection
		$conn = new mysqli($servername, $serverusername, $serverpassword, $db);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$username=$_POST['username']; 
		$password=$_POST['password']; 
		$email=$_POST['email']; 

		$sql = "INSERT INTO Agent (username,email,password,timeCreated)
		VALUES ('$username','$email','$password',CURRENT_TIMESTAMP)"; 

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	}

?>

<button type="button" onClick="parent.location='../admin.php'">
	Return
</button>