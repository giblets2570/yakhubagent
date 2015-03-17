<?php

	header('Content-type: text/xml');

	include 'vars.php';
	$error = "";

	require_once('FirePHPCore/FirePHP.class.php');
    $firephp = FirePHP::getInstance(true);

	// ini_set('display_errors',1);
 //    ini_set('display_startup_errors',1);
 //    error_reporting(-1);

    $recordingURL = "";

	if(isset($_POST['RecordingUrl'])){
		$recordingURL = $_POST['RecordingUrl'];
	}

	$recordingDuration = "";

	if(isset($_POST['DialCallDuration'])){
		$recordingDuration = $_POST['DialCallDuration'];
	}

	$status = "";

	if(isset($_POST['DialCallStatus'])){
		$status = $_POST['DialCallStatus'];
	}

	$agentname = $_POST['From'];

	$agentname = substr($agentname, 7, 50);

	$numberCalled = $_GET['to'];

	$firephp->log($numberCalled);

	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	//getting the client for this call
	$query = $mysqli->query("select * from Contract where  agentname='$agentname'");
	$row = $query->fetch_array();
	$clientname = $row["clientname"];

	$error = $error.$clientname;

	$firephp->log($clientname);

	$businessname = "";
	//now i need to get the businessname for this call
	$query = $mysqli->query("select * from Numbers where number='$numberCalled'");
	if($query){ 	
		$row = $query->fetch_array();
		$businessname = $row['businessname'];
	}

	$error = $error.$businessname;

	$query = "INSERT INTO Called (id,agentname,number,businessname,clientname,pickedup,appointment,lead,notes,recordingURL,recordingDuration,callStatus,timeCreated)
		VALUES (NULL,'$agentname','$numberCalled','$businessname','$clientname',NULL,NULL,NULL,NULL,'$recordingURL','$recordingDuration','$status',CURRENT_TIMESTAMP)";

	$firephp->log($businessname);

	if ($mysqli->query($query) === TRUE) {
	    // 
	    $error = $error."created";
	} else {
		// 
		$error = $error.'error in connection';
	}

	$changeNumber = "Update Numbers set called='yes' where number='$numberCalled'";

	$mysqli->query($changeNumber);

	$mysqli->close(); 

?>
<Response>
    <Say>
          "Good bye."
    </Say>
</Response>