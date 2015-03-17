<?php
    include('../session.php');
    include 'vars.php';

    if($_SESSION['agent'] != "TomMurray"){
    	echo "Unable to create user";
    }else{
    	$message="Record not deleted<br>";
		// Create connection
		$conn = new mysqli($servername, $serverusername, $serverpassword, $db);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$agentname=$_POST['agentname']; 

		$query = $conn->query("select * from Agent where username='$agentname'");

		$rows = $query->num_rows;

		if ($rows > 0) {

			$twilioquery = $conn->query("select * from Agent where username='$agentname'");
			$twiliorows = $query->num_rows;

			if ($twiliorows > 0){
				if ($conn->query("delete * from Twilio where username='$agentname'") === TRUE) {
			    	echo "Twilio details deleted<br>";
				} else {
				    echo "Twilio details not deleted<br>";
				}
			}

			if $conn->query("delete * from Agent where username='$agentname'") === TRUE) {
		    	$message = "Record changed successfully<br>";
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