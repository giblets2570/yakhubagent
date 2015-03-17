<?php 
	include 'vars.php';


			$mysqli = new mysqli($servername, $serverusername, $serverpassword, $db);

			if ($mysqli->connect_errno) {
			    printf("Connect failed: %s\n", $mysqli->connect_error);
			    exit();
			}


			// SQL query to fetch information of registerd users and finds user match.
			$query = $mysqli->query("select * from Agent");

			while($row = $query->fetch_array()){
			  	echo $row['username'] . " " . $row['password'];
			  	echo "<br />";
			}

			$mysqli->close();

?>