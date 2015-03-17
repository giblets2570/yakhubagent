<?php

	include 'vars.php';

    require_once('FirePHPCore/FirePHP.class.php');
    $firephp = FirePHP::getInstance(true);

    // ini_set('display_errors',1);
    // ini_set('display_startup_errors',1);
    // error_reporting(0);

    error_reporting(E_ALL ^ E_NOTICE);

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

    //all the variables of the post data
    $number = $request->number;
    $numberid = $request->id;
    $businessname = $request->businessname;
    $agentname = $request->agentname;
    $clientname = $request->clientname;

    //all the inputs if the dude answers
    $pickedup = $request->pickedup;
    $interested = $request->interested;
    $appointment = $request->appointment;
    $notes = $request->notes;
    $lead = $request->lead;

    // echo "Hello";

    $firephp->log("Log", "Label");

	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    //Need to update the database with the last call
    //it will be -1 if the agent has just started the session
    if($numberid != -1){

        //this part is getting the number

        $sqlForNumber = "select * from Called where agentname='$agentname'";

        $numQuery = $mysqli->query($sqlForNumber);

        $numResults = $numQuery->num_rows;

        $firephp->log("Num agents", $numResults);

        $rows = array();

        while($r = $numQuery->fetch_assoc()){
            $rows[] = $r;
        }

        $ID = $rows[$numResults-1]['id'];
        $firephp->log($rows);
        $firephp->log($rows[$numResults-1]);
        $firephp->log($numResults);
        $firephp->log($ID);

        $sqlInsertCallNotes = "update Called set businessname='$businessname', pickedup='$pickedup', 
        interested='$interested', appointment='$appointment', lead='$lead', notes='$notes' where id='$ID'";

        $mysqli->query($sqlInsertCallNotes);
    }

    

    //need to check if agent is already on a call
    $sqlCheckForAgent = "select * from Calling";

    $query = $mysqli->query($sqlCheckForAgent);

    if($query){

        $agentInCall = $query->num_rows;
        if($agentInCall > 0){

            $sqlRemoveAgent = "DELETE FROM Calling WHERE agentname='$agentname'";

            $mysqli->query($sqlRemoveAgent);

        }
    }
    
    //this part is getting the number

    $sqlForNewNumber = "select * from Numbers where called = 'no' and number not in (select number from Calling) limit 3";

    $numQuery = $mysqli->query($sqlForNewNumber);

    $rows = array();

    if($numQuery){
        while($r = $numQuery->fetch_assoc()){
            $rows[] = $r;
        }
    }

    
    //Now i have to put this number in calling
    $nextNumber = $rows[0]['number'];

    $sqlAddIntoCalling = "INSERT INTO Calling (id,number,businessname,agentname,clientname,timeCreated)
        VALUES (NULL,'$nextNumber','$businessname','$agentname','$clientname',CURRENT_TIMESTAMP)";

    $query = $mysqli->query($sqlAddIntoCalling); 

    echo json_encode($rows)

?>