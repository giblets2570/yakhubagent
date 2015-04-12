<?php

	include 'db.php';

    // require_once('FirePHPCore/FirePHP.class.php');
    // $firephp = FirePHP::getInstance(true);

    // ini_set('display_errors',1);
    // ini_set('display_startup_errors',1);
    // error_reporting(0);

    // error_reporting(E_ALL ^ E_NOTICE);

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

    //all the variables of the post data
    $number = $request->number;
    $username = $request->username;
    $clientname = $request->clientname;

    // echo "Hello";

    // $firephp->log("Log", $businessname);

	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    //Need to update the database with the last call
    //it will be -1 if the agent has just started the session
    if($number != -1){
        $businessname = $request->businessname;
        //all the inputs if the dude answers
        $pickedup = $request->pickedup;
        $interested = $request->interested;
        $appointment = $request->appointment;
        $notes = $request->notes;
        $lead = $request->lead;
        $address = $request->address;

        //this part is getting the number

        $sqlForNumber = "select * from Recordings where agentname='$username'";

        $numQuery = $mysqli->query($sqlForNumber);

        $numResults = $numQuery->num_rows;

        // $firephp->log("Num agents", $numResults);

        $rows = array();

        while($r = $numQuery->fetch_assoc()){
            $rows[] = $r;
        }

        $recordingID = $rows[$numResults-1]['id'];

        // $firephp->log($rows);
        // $firephp->log($rows[$numResults-1]);
        
        // $firephp->log($pickedup);
        // $firephp->log($address);
        // $firephp->log($businessname);
        // $firephp->log($recordingID);

        // $firephp->log("id of thing i will update", $recordingID);
        // $firephp->log("number of the thing i called", $number);

        $sqlInsertCalled = "INSERT INTO Called (id,agentname,number,businessname,address,clientname,pickedup,interested,appointment,lead,notes,recordingID,timeCreated)
        VALUES (NULL,'$username','$number','$businessname','$address','$clientname','$pickedup','$interested','$appointment','$lead','$notes','$recordingID',CURRENT_TIMESTAMP)";

        // $firephp->log("The error is not above");

        if($mysqli->query($sqlInsertCalled) === TRUE){
            // $firephp->log("yay");
        }else{
            // $firephp->log("yay2");
            // $firephp->log($mysqli->error);
        }
        // $firephp->log("yay3");

    }

    //need to check if agent is already on a call
    $sqlCheckForAgent = "select * from Calling";

    $query = $mysqli->query($sqlCheckForAgent);

    if($query){

        $agentInCall = $query->num_rows;
        if($agentInCall > 0){

            $sqlRemoveAgent = "DELETE FROM Calling WHERE agentname='$username'";

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

    // $firephp->log("Next numbers",$rows);

    
    //Now i have to put this number in calling
    $nextNumber = $rows[0]['number'];
    $businessname = $rows[0]['businessname'];

    $sqlAddIntoCalling = "INSERT INTO Calling (id,number,businessname,agentname,clientname,timeCreated)
        VALUES (NULL,'$nextNumber','$businessname','$username','$clientname',CURRENT_TIMESTAMP)";

    $query = $mysqli->query($sqlAddIntoCalling); 

    echo json_encode($rows)

?>