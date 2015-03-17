<?php
    include('../session.php');
    include 'vars.php';

    if($_SESSION['agent'] != "TomMurray"){
    	echo "Unable to create user";
    }else{
    	$message="Record not deleted";
		// Create connection
		$conn = new mysqli($servername, $serverusername, $serverpassword, $db);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$clientname=$_POST['clientname']; 

		$query = $conn->query("select * from Client where name='$clientname'");

		$rows = $query->num_rows;

		if ($rows > 0) {
			if ($conn->query("delete * from Client where name='$clientname'") === TRUE) {
		    	$message = "Record changed successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		echo $message;

		$conn->close();
	}

?>

<button type="button" onClick="parent.location='../admin.php'">
	Return
</button>