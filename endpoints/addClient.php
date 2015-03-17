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

		$clientname=$_POST['clientname']; 
		$password=$_POST['password']; 
		$email=$_POST['email']; 
		$website=$_POST['website']; 

		$sql = "INSERT INTO Client (name,email,password,website,timeCreated)
		VALUES ('$clientname','$email','$password','$website',CURRENT_TIMESTAMP)"; 

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