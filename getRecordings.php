<?php

	include 'vars.php';

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$agent = $request->Agent;
	#$agent = "PhilipFortio";


	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    //checking to see if this agent exists
    $query = $mysqli->query("select * from Called where agentname='$agent'");

    $rows = array();
    while($r = $query->fetch_assoc()){
        $rows[] = $r;
        //array_unshift($row , $r);
    }

    echo json_encode($rows)

?>