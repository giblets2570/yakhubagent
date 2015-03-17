<?php

	include 'vars.php';

    require_once('FirePHPCore/FirePHP.class.php');
    $firephp = FirePHP::getInstance(true);

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(0);

    error_reporting(E_ALL ^ E_NOTICE);

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

    //all the variables of the post data
    $scriptNotes = $request->scriptNotes;
    $agentname = $request->agentname;
    $clientname = $request->clientname;


    $firephp->log($clientname, "Label");

	$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $sqlForAgent = "select * from ScriptNotes where agentname='$agentname'";

    $numQuery = $mysqli->query($sqlForAgent);

    $numResults = $numQuery->num_rows;

    if($numResults>0){
        $sqlForClient = "select * from ScriptNotes where clientname='$clientname'";

        $numQuery = $mysqli->query($sqlForClient);

        $numResults = $numQuery->num_rows;

        if($numResults>0){
            $firephp->log("agent and client found");
            $sqlUpdate = "update ScriptNotes set scriptNotes='$scriptNotes' where agentname='$agentname' 
            and clientname='$clientname'";

            $query = $mysqli->query($sqlUpdate);
        }else{
            $firephp->log("agent found");
            $sqlInsertNew = "insert into ScriptNotes (agentname,clientname,scriptNotes,timeCreated) 
            values ('$agentname','$clientname','$scriptNotes',CURRENT_TIMESTAMP)";

            $query = $mysqli->query($sqlInsertNew);
        }
    }else{
        $firephp->log("none found");
        $sqlInsertNew = "insert into ScriptNotes (agentname,clientname,scriptNotes,timeCreated) 
            values ('$agentname','$clientname','$scriptNotes',CURRENT_TIMESTAMP)";
            $query = $mysqli->query($sqlInsertNew);
    }


    echo '[]';

?>