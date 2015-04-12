<?php
	include 'db.php';
	include '../Services/Twilio/Capability.php';

	$result = array();
	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        $result['token'] = NULL;
		echo json_encode($result);
        exit();
    }

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$username = $request->username;
	$sql = "select * from Twilio where username='$username'";

	$query = $mysqli->query($sql);

	if($query){
		$num_rows = $query->num_rows;
		if ($num_rows < 1){
			$result['token'] = NULL;
			echo json_encode($result);
	        exit();
		}
		$row = $query->fetch_assoc();
		$capability = new Services_Twilio_Capability($row['accountsid'], $row['authtoken']);
	    $capability->allowClientOutgoing($row['appid']);
	    $capability->allowClientIncoming($username);
	    $token = $capability->generateToken();

	    $result['token'] = $token;
		echo json_encode($result);
	    exit();
	}else{
		$result['token'] = $mysqli->error;
		echo json_encode($result);
	    exit();
	}
?>