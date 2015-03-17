<?php
    include('session.php');
    include 'vars.php';
    include 'Services/Twilio/Capability.php';

    $agent = $_SESSION['agent'];
    $accountSid = "None";
    $authToken = "None";
    $appSid = "None";
    $number = "None";

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
    $agentRows = $agentquery->num_rows;

    if ($agentRows == 1){
        $agentResult = $agentquery->fetch_assoc();
        $client = $agentResult['clientname'];
    }

    $scriptNotes = "";

    $scriptNotesQuery = $mysqli->query("select * from ScriptNotes where agentname='$agent' and clientname='$client' ");
    $scriptNotesRows = $scriptNotesQuery->num_rows;
    if ($scriptNotesRows > 0){
        $scriptResult = $scriptNotesQuery->fetch_assoc();
        $scriptNotes = $scriptResult['scriptNotes'];
    }


    $mysqli->close(); 

    $capability = new Services_Twilio_Capability($accountSid, $authToken);
    $capability->allowClientOutgoing($appSid);
    $capability->allowClientIncoming($agent);
    $token = $capability->generateToken();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Yakhub personal page</title>
        
        <!-- <script type="text/javascript" src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script> -->
        <script type="text/javascript" src="https://static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
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
    </head>
    <body ng-app="yakhub">
        <nav class="navbar navbar-default" style="background: url('../Images/swirl_pattern_col.png') repeat">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <h3 class= "text-center logo-text">
                        <img class="logo_img" src="Images/logo.png" width="32px"/>
                        Yak Hub Agent <?php echo $agent;?>
                    </h3>
                </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <button type="button" class="btn btn-primary" onClick="parent.location='showRecordings.php'">
                                Calls
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-primary" onClick="parent.location='logout.php'">
                                Logout
                            </button>
                        </li>
                        <li>
                            <?php 
                                if($agent == "TomMurray"){
                                    adminButton();
                                }
                            ?>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div id="wrapper" ng-controller="MainController">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <!-- <li class="sidebar-brand">
                                <p>
                                    <?php
                                        echo $agent;
                                    ?>
                                </p>
                        </li> -->
                        <li>
                            <a ng-click="showScriptFunc()" >
                                <p>
                                    Show Script
                                </p>
                            </a>
                        </li>
                        <li>
                            <a ng-click="showScriptNotesFunc()">
                                <p>
                                    Show Script Notes
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            <!-- /#sidebar-wrapper -->

            <div class="container-fluid body-film">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="right_col" style="background-color:#f5f5f5">

                            <div class="form-group">
                                <label for="number">Number</label>
                                <input type="text" class="form-control" id="number" name="number" ng-model="phone"
                                aria-describedby="basic-addon1" style="font-size: 30" autocomplete="off">
                            </div>

                            <button type="button" class="btn btn-success" ng-click="call()">
                                Call
                            </button>

                            <button type="button" class="btn btn-danger" ng-click="hangUp()">
                                Hangup
                            </button>
                         
                            <div id="log">Setting up...</div>

                            <div>
                                <ul>
                                    <li ng-repeat="place in places | limitTo:1"> 
                                        {{place.businessname}}, {{place.address}} - <a ng-click="inputNumber(place.number, place.id, place.businessname, place.address)"> {{place.number}}</a> 
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <input type="text" id="newNumber" name="newNumber" ng-model="newNumber" 
                                aria-describedby="basic-addon1" style="font-size: 30" autocomplete="off"
                                placeholder="Number...">
                                <input type="text" id="newBusiness" name="newBusiness" ng-model="newBusiness" 
                                aria-describedby="basic-addon1" style="font-size: 30" autocomplete="off"
                                placeholder="Business name...">
                                <button type="button" class="btn btn-success" ng-click="inputNumber(newNumber,0,newBusiness,0)"> 
                                    New business
                                </button>
                            </div>

                            <form name="myForm" >
                                <div class="row">
                                    <div class="col-sm-3">
                                        <tt>Picked up:</tt><br/>
                                        <input type="radio" ng-model="picked" value="yes"> Yes <br/>
                                        <input type="radio" ng-model="picked" value="no"> No <br/><br/>
                                    </div>
                                    <div class="col-sm-3">
                                        <tt>Interested:</tt><br/>
                                        <input type="radio" ng-model="interested" value="yes"> Yes <br/>
                                        <input type="radio" ng-model="interested" value="no"> No <br/><br/>
                                    </div>
                                    <div class="col-sm-3">
                                        <tt>Appointment:</tt><br/>
                                        <input type="radio" ng-model="appointment" value="yes"> Yes <br/>
                                        <input type="radio" ng-model="appointment" value="no"> No <br/><br/>
                                    </div>
                                    <div class="col-sm-3">
                                        <tt>Lead:</tt><br/>
                                        <input type="radio" ng-model="lead" value="yes"> Yes <br/>
                                        <input type="radio" ng-model="lead" value="no"> No <br/><br/>
                                    </div>
                                </div>
                                <div>

                                    <label for="notes">Notes:</label>
                                    <textarea class="form-control" rows="10" id="notes" ng-model="notes"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" ng-click="completeCall()">Submit</button>
                            </form>

                        </div>
                    </div>
                    <div class="col-sm-6" ng-show='showScript'>
                        <div class="right_col" style="background-color:#f5f5f5" >
                            <iframe src="DobeoScript.pdf" style="width:100%; height:600px;" frameborder="10"></iframe>
                        </div>
                    </div>
                    <div class="col-sm-6" ng-show='showScriptNotes'>
                        <div class="right_col" style="background-color:#f5f5f5">
                            <label for="scriptNotes">Script Notes:</label>
                                <textarea class="form-control" rows="12" id="scriptNotes" ng-model="scriptNotes" ng-init='setScriptNotes("<?php echo $scriptNotes; ?>")'></textarea>
                                <button type="button" class="btn btn-primary" ng-click="saveScriptNotes()">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Library Import -->
        <script type="text/javascript" src="js/angular.min.js"></script>

        <!-- App Import -->
        <script type="text/javascript" src="js/app.js"></script>


        <!-- setting the variables for the javascript -->

        <script>
            var agentname = "<?php echo $agent?>";
            var clientname = "<?php echo $client?>";
            console.log(agentname);
            console.log(clientname);
        </script>

        <!-- Controller Impoters -->
        <!--<script type="text/javascript" src="js/main-controller.js"></script>-->

        <!-- javascript to ask if they want to leave the page -->
        <script type="text/javascript">
            window.onbeforeunload = function() {
                return "Data will be lost if you leave the page, are you sure?";
            };
        </script>

        <!-- Javascript behind twilio -->
        <script type="text/javascript">

            var OutgoingNumber = "<?php echo $number ?>";
            var Agent = "<?php echo $agent?>";
            var Client = "<?php echo $client?>";

            Twilio.Device.setup("<?php echo $token; ?>");
         
            Twilio.Device.ready(function (device) {
                $("#log").text("Ready");
            });
         
            Twilio.Device.error(function (error) {
                $("#log").text("Error: " + error.message);
            });
         
            Twilio.Device.connect(function (conn) {
                $("#log").text("Successfully established call");
            });
         
            Twilio.Device.disconnect(function (conn) {
                $("#log").text("Call ended");
            });
         
            Twilio.Device.incoming(function (conn) {
                $("#log").text("Incoming connection from " + conn.parameters.From);
                // accept the incoming connection and start two-way audio
                conn.accept();
            });
         
            function call() {
                // get the phone number to connect the call to
                params = {"PhoneNumber": $("#number").val(),
                        "OutgoingNumber": OutgoingNumber,
                        "Agent": Agent,
                        "Client": Client};
                Twilio.Device.connect(params);
            }
         
            function hangup() {
                Twilio.Device.disconnectAll();
                viewController.hangUp();
            }
        </script>



    </body>
</html>

<?php
    function adminButton(){
        echo '
            <button type="button" class="btn btn-default" onClick="parent.location=\'admin.php\'">
                Admin Page
            </button>
            ';
    }
?>
