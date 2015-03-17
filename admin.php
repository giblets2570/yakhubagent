<!DOCTYPE html>
<html>
    <head>
        <title>Yakhub personal page</title>
        <script type="text/javascript" src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Dosis:400,500' rel='stylesheet' type='text/css'>
        <script src="//code.jquery.com/jquery.min.js"></script>

        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link href="css/simple-sidebar.css" rel="stylesheet">

    </head>
    <body ng-app="yakhub">

        <nav class="navbar navbar-default" style="background: url('../Images/swirl_pattern_col.png') repeat">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <h3 class= "text-center logo-text">
                        <img class="logo_img" src="Images/logo.png" width="32px"/>
                        Yak Hub Admin
                    </h3>
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <button type="button" class="btn btn-primary" onClick="parent.location='profile.php'">
                                Agent
                            </button>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div ng-controller="MainController" class="container-fluid body-film">

            <div id="wrapper">

                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                                <p>
                                    Yak Hub Admin
                                </p>
                        </li>
                        <li>
                            <a ng-click="adminController.makeAgentFunc()">
                                <p>
                                    Make agent
                                </p>
                            </a>
                        </li>
                        <li>
                            <a ng-click="adminController.allocateAgentFunc()" >
                                <p>
                                    Allocate agent
                                </p>
                            </a>
                        </li>
                        <li>
                            <a ng-click="adminController.deleteAgentFunc()">
                                <p>
                                    Delete agent
                                </p>
                            </a>
                        </li>
                        <li>
                            <a ng-click="adminController.setUpTwilioFunc()">
                                <p>
                                    Set up Twilio
                                </p>
                            </a>
                        </li>
                        <li>
                            <a ng-click="adminController.makeClientFunc()">
                                <p>
                                    Make client
                                </p>
                            </a>
                        </li>
                        <li>
                            <a ng-click="adminController.deleteClientFunc()">
                                <p>
                                    Delete client
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12" ng-show="adminController.makeAgent">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                <tr>
                                    <form name="form1" method="post" action="endpoints/addAgent.php">
                                    <td>
                                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                            <tr>
                                                <td colspan="3"><strong>Add Agent</strong></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    Username
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="username" type="text" id="username">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Password
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <input name="password" type="password" id="password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    Email
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="email" type="text" id="email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <!--<input type="submit" name="Submit" value="Login">-->
                                                    <button type="Submit" name="Submit" class="btn btn-success">
                                                        Create
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </form>
                                </tr>
                            </table>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-12" ng-show="adminController.allocateAgent">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                <tr>
                                    <form name="form1" method="post" action="endpoints/allocateAgent.php">
                                    <td>
                                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                            <tr>
                                                <td colspan="3"><strong>Allocate Agent</strong></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    Agent
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="agentname" type="text" id="agentname">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Client
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <input name="clientname" type="text" id="clientname">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <!--<input type="submit" name="Submit" value="Login">-->
                                                    <button type="Submit" name="Submit" class="btn btn-success">
                                                        Allocate
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </form>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12" ng-show="adminController.deleteAgent">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                <tr>
                                    <form name="form1" method="post" action="endpoints/deleteAgent.php">
                                    <td>
                                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                            <tr>
                                                <td colspan="3"><strong>Delete Agent</strong></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    Agent
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="agentname" type="text" id="agentname">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <!--<input type="submit" name="Submit" value="Login">-->
                                                    <button type="Submit" name="Submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </form>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12" ng-show="adminController.setUpTwilio">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                <tr>
                                    <form name="form1" method="post" action="endpoints/addTwilio.php">
                                    <td>
                                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                            <tr>
                                                <td colspan="3"><strong>Add Twilio Information</strong></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    Username
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="username" type="text" id="username">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    Number
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="number" type="text" id="number">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    TwilioSID
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <input name="twiliosid" type="text" id="twiliosid">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    TwilioAuth
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="twilioauth" type="text" id="twilioauth">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    TwilioAppID
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="twilioappid" type="text" id="twilioappid">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <!--<input type="submit" name="Submit" value="Login">-->
                                                    <button type="Submit" name="Submit" class="btn btn-success">
                                                        Create
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </form>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12" ng-show="adminController.makeClient">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                <tr>
                                    <form name="form1" method="post" action="endpoints/addClient.php">
                                        <td>
                                            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                                <tr>
                                                    <td colspan="3"><strong>Add Client</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <br/>
                                                    </td>
                                                    <td>
                                                        <br/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="78">
                                                        Username
                                                    </td>
                                                    <td width="6">
                                                        :
                                                    </td>
                                                    <td width="294">
                                                        <input name="clientname" type="text" id="clientname">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Password
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td>
                                                        <input name="password" type="password" id="password">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="78">
                                                        Email
                                                    </td>
                                                    <td width="6">
                                                        :
                                                    </td>
                                                    <td width="294">
                                                        <input name="email" type="text" id="email">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="78">
                                                        Website
                                                    </td>
                                                    <td width="6">
                                                        :
                                                    </td>
                                                    <td width="294">
                                                        <input name="website" type="text" id="webite">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <!--<input type="submit" name="Submit" value="Login">-->
                                                        <button type="Submit" name="Submit" class="btn btn-success">
                                                            Create
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </form>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12" ng-show="adminController.deleteClient">
                        <div class="right_col" style="background-color:#f5f5f5">
                            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                <tr>
                                    <form name="form1" method="post" action="endpoints/deleteClient.php">
                                    <td>
                                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                            <tr>
                                                <td colspan="3"><strong>Delete Client</strong></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="78">
                                                    Client
                                                </td>
                                                <td width="6">
                                                    :
                                                </td>
                                                <td width="294">
                                                    <input name="clientname" type="text" id="clientname">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <!--<input type="submit" name="Submit" value="Login">-->
                                                    <button type="Submit" name="Submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    </form>
                                </tr>
                            </table>
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
        <script type="text/javascript" src="js/main-controller.js"></script>
    </body>
</html>
