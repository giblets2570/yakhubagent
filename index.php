<?php
	include('login.php'); // Includes Login Script

	if(isset($_SESSION['agent'])){
		header("Location: profile.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script src="//code.jquery.com/jquery.min.js"></script>


        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Dosis:400,500' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
	</head>
	<body>
		<div class="container-fluid">
	    	<div class="row">
	        	<div class="col-sm-6">
	        		<div class="left_col">
	        			<div class="stuff-wrapper">
		        			<div class="logo">
		    					<h1 class= "text-center logo-text">
		    						<img class="logo_img" src="Images/logo.png" width="48px"/>
		    						Yak Hub Agent
		    					</h1>
		        			</div>
		    				<div class="sub_header">
		    					<h4 class="text-center">
		    						Agent sign-in
		    					</h4>
		    				</div>
	    				</div>	
	        		</div>
	        	</div>
	        	<div class="col-sm-6">
		        	<div class="right_col">
			        	<div class="form_container">
				        	<form action="" method="post" role="form">	
				          		<div class="form-group">
				            		<label for="username">Name</label>
				            		<input type="text" class="form-control" name="username" id="username" placeholder="e.g. 'Agent Smith'">
				          		</div>
				          		<div class="form-group">
				            		<label for="password">Password</label>
				            		<input type="password" class="form-control" name="password" id="password" placeholder="*********">
				          		</div>
				          		<div class="form-group">
				            	
				          		</div>	          
								<input id="submit" name="submit" type="submit" value=" Login " class="btn btn-primary">
			        		</form>	
			        	</div>
					</div>
	        	</div>
	    	</div>
	    </div>
	</body>
</html>