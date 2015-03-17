<?php
    include('../session.php');
    include 'vars.php';

    if($_SESSION['agent'] != "TomMurray"){
    	echo "Unable to create user";
    }else{
    	$message="New record created successfully";
		// Create connection
		$conn = new mysqli($servername, $serverusername, $serverpassword, $db);
		// Check connection
		if ($conn->connect_error) {
			returnButton();
		    die("Connection failed: " . $conn->connect_error);
		}

		$agentname=$_POST['agentname']; 
		$clientname=$_POST['clientname']; 

		if($conn->query("select * from Agent where username='$agentname'") === FALSE){
			returnButton();
			die("This agent does not exist");
		}
		

		$findclient = $conn->query("select * from Client where name='$clientname'");
		$clientrows = $findclient->num_rows;

		if($clientrows != 0){
			$query = $conn->query("select * from Contract where agentname='$agentname'");

			$rows = $query->num_rows;

			if ($rows > 0) {
				if ($conn->query("delete from Contract where agentname='$agentname'") === TRUE) {
			    	$message = "Record changed successfully";
				} else {
				    echo "Error: " . "<br>" . $conn->error;
				}
			}


			$sql = "INSERT INTO Contract (id,agentname,clientname,timeCreated)
			VALUES (NULL,'$agentname','$clientname',CURRENT_TIMESTAMP)"; 

			if ($conn->query($sql) === TRUE) {
			    echo $message;
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
			echo "The client does not exist.<br>";
		}
		$conn->close();
	}
	returnButton();
?>
<?php 
	function returnButton(){
		echo '
			<button type="button" onClick="parent.location=\'../admin.php\'">
				Return
			</button>';
	}

?>