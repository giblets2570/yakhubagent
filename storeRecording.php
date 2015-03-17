<?php
	header('Content-type: text/xml');

	include 'vars.php';

	if(isset($_POST['RecordingUrl'])){

		$recordingURL = $_POST['RecordingUrl'];


		$recordingDuration = "";

		if(isset($_POST['DialCallDuration'])){
			$recordingDuration = $_POST['DialCallDuration'];
		}

		$status = "";

		if(isset($_POST['DialCallStatus'])){
			$status = $_POST['DialCallStatus'];
		}

		$agent = $_POST['From'];

		$agent = substr($agent, 7, 50);

		$numberCalled = $_GET['to'];

		$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

		if ($mysqli->connect_errno) {
		    printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}

		$query = $mysqli->query("select * from Contract where agentname='$agent'");

		$row = $query->fetch_array();

		$client = $row['clientname'];

		$query = "INSERT INTO Recordings (id,agentname,clientname,numberCalled,recordingURL,recordingDuration,callStatus,timeCreated)
			VALUES (NULL,'$agent','$client','$numberCalled','$recordingURL','$recordingDuration','$status',CURRENT_TIMESTAMP)"; 

		if ($mysqli->query($query) === TRUE) {
		    // echo "New record created successfully";
		} else {
			// echo "Error: " . $query . "<br>" . $mysqli->error;
		}

		$mysqli->close(); 

	}
?>
<Response>
    <Say>
          <?php echo "Good bye."; ?>
    </Say>
</Response>