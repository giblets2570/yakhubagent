<?php
	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$username = $request->username;
	$password = $request->password;

	include 'db.php';

	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

	$sql = "select * from Agent where username='$username'";
	$query = $mysqli->query($sql);

	if($query){
		// Sweet
		$numrows = $query->num_rows;

		if($numrows > 0){
			$row = $query->fetch_assoc();
			if($password === $row['password']){
				$sql = "select * from Contract where agentname='$username'";
				$query = $mysqli->query($sql);
				if($query){
					$results = array();
					$results['username'] = $row['username'];
					$row = $query->fetch_assoc();
					$results['clientname'] = $row['clientname'];
					echo json_encode($results);
					exit();
				}
			}
		}
	}
	$results = array();
	$results['username'] = -1;
	echo json_encode($results);
	exit();
?>