<?php
    include('session.php');
    include 'vars.php';

    $agent = $_SESSION['agent'];

    //connecting to the database

    $mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    //checking to see if this agent exists
    $twilioquery = $mysqli->query("select * from Twilio where username='$agent'");
    $twilioRows = $twilioquery->num_rows;

    if ($twilioRows == 1){
        $twilioResult = $twilioquery->fetch_assoc();

        $accountSid = $twilioResult['accountsid'];
        $authToken = $twilioResult['authtoken'];
        $appSid = $twilioResult['appid'];
        $number = $twilioResult['number'];
    }


    $client = "";

    $agentquery = $mysqli->query("select * from Contract where agentname='$agent'");
    $agentRows = $twilioquery->num_rows;

    if ($agentRows == 1){
        $agentResult = $agentquery->fetch_assoc();
        $client = $agentResult['clientname'];
    }

    $mysqli->close(); 
    // echo $token;
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Yakhub personal page</title>
        <!-- <script type="text/javascript" src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script> -->
        <script type="text/javascript" src="https://static.twilio.com/libs/twiliojs/1.1/twilio.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Dosis:400,500' rel='stylesheet' type='text/css'>
        <script src="//code.jquery.com/jquery.min.js"></script>

        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="css/custom.css">
        
        <!--This is the javascript behind the site-->

        <!-- Custom CSS -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <script>
            var agentname = "<?php echo $agent?>";
            var clientname = "<?php echo $client?>";
            console.log(agentname);
            console.log(clientname);
        </script>
    </head>
    <body ng-app="yakhub">
        <nav class="navbar navbar-default" style="background: url('../Images/swirl_pattern_col.png') repeat">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <h3 class= "text-center logo-text">
                        <img class="logo_img" src="Images/logo.png" width="32px"/>
                        Yak Hub Agent Recordings
                    </h3>
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <button type="button" class="btn btn-primary" onClick="parent.location='profile.php'">
                                Profile
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-primary" onClick="parent.location='logout.php'">
                                Logout
                            </button>
                        </li>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div id="wrapper" ng-controller="MainController">

                <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                            Calls
                    </li>
                    <li>
                        <a ng-click="allCalls()">
                            All
                        </a>
                    </li>
                    <li>
                        <a ng-click="allPicked()">
                            Picked Up
                        </a>
                    </li>
                    <li>
                        <a ng-click="allInter()">
                            Interested
                        </a>
                    </li>
                    <li>
                        <a ng-click="allAppoint()">
                            Appointment
                        </a>
                    </li>
                    <li>
                        <a ng-click="allLead()">
                            Lead
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            <div class="container-fluid body-film">
                <div class="row" ng-show="showAll">
                    <div class="col-sm-12">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <ol>
                                <li ng-repeat="call in calls">
                                    <p>
                                        <a href={{call.recordingURL}}> {{call.recordingURL}} </a>
                                    </p>                                
                                    <p>
                                        Time - {{call.timeCreated}} -:- Recording length - {{call.recordingDuration}}
                                    </p>
                                    <p>
                                        Businessname - {{call.businessname}} -:- Number - {{call.number}}
                                    </p>
                                    <p>
                                        Notes - {{call.notes}}
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid body-film">
                <div class="row" ng-show="showPicked">
                    <div class="col-sm-12">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <ol>
                                <li ng-repeat="call in calls | filter:{pickedup:'yes'}">
                                    <p>
                                        <a href={{call.recordingURL}}> {{call.recordingURL}} </a>
                                    </p>                                
                                    <p>
                                        Time - {{call.timeCreated}} -:- Recording length - {{call.recordingDuration}}
                                    </p>
                                    <p>
                                        Businessname - {{call.businessname}} -:- Number - {{call.number}}
                                    </p>
                                    <p>
                                        Notes - {{call.notes}}
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="showInter">
                    <div class="col-sm-12">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <ol>
                                <li ng-repeat="call in calls | filter:{interested:'yes'}">
                                    <p>
                                        <a href={{call.recordingURL}}> {{call.recordingURL}} </a>
                                    </p>                                
                                    <p>
                                        Time - {{call.timeCreated}} -:- Recording length - {{call.recordingDuration}}
                                    </p>
                                    <p>
                                        Businessname - {{call.businessname}} -:- Number - {{call.number}}
                                    </p>
                                    <p>
                                        Notes - {{call.notes}}
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="showAppoint">
                    <div class="col-sm-12">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <ol>
                                <li ng-repeat="call in calls | filter:{appointment:'yes'}">
                                    <p>
                                        <a href={{call.recordingURL}}> {{call.recordingURL}} </a>
                                    </p>                                
                                    <p>
                                        Time - {{call.timeCreated}} -:- Recording length - {{call.recordingDuration}}
                                    </p>
                                    <p>
                                        Businessname - {{call.businessname}} -:- Number - {{call.number}}
                                    </p>
                                    <p>
                                        Notes - {{call.notes}}
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="showLead">
                    <div class="col-sm-12">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <ol>
                                <li ng-repeat="call in calls | filter:{lead:'yes'}">
                                    <p>
                                        <a href={{call.recordingURL}}> {{call.recordingURL}} </a>
                                    </p>                                
                                    <p>
                                        Time - {{call.timeCreated}} -:- Recording length - {{call.recordingDuration}}
                                    </p>
                                    <p>
                                        Businessname - {{call.businessname}} -:- Number - {{call.number}}
                                    </p>
                                    <p>
                                        Notes - {{call.notes}}
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Library Import -->
        <script type="text/javascript" src="js/angular.min.js"></script>

        <!-- App Import -->
        <script type="text/javascript" src="js/app.js"></script>

        <!-- Controller Impotrs -->
        <!--<script type="text/javascript" src="js/main-controller.js"></script>-->

        <!-- Script to resize the google sheet -->

    </body>
</html>
