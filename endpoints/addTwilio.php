<?php
    include('../session.php');
    include 'vars.php';

    if($_SESSION['agent'] != "TomMurray"){
    	echo "Unable to do things";
    }else{

		
		// Create connection
		$conn = new mysqli($servername, $serverusername, $serverpassword, $db);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$username=$_POST['username']; 
		$number=$_POST['number'];
		$twiliosid=$_POST['twiliosid'];
		$twilioauth=$_POST['twilioauth'];
		$twilioappid=$_POST['twilioappid'];

		$query = $conn->query("select * from Agent where username='$username'");

		$rows = $query->num_rows;
		if ($rows != 1) {
			echo "username is invalid";
			die("username is invalid");
		}

		$sql = "INSERT INTO Twilio (id,username,number,authtoken,accountsid,appid,timeCreated)
		VALUES (NULL,'$username','$number','$twilioauth','$twiliosid','$twilioappid',CURRENT_TIMESTAMP)"; 

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