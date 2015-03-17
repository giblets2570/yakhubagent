<!DOCTYPE html>
<html>
<body>

<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//////////////////
/// insert table results
///////////////////////////

include 'vars.php';

$conn = new mysqli($servername, $serverusername, $serverpassword, $db);

if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

///////////////////////////////////////
/////////// Change SQL query to return appointments
/////////////////////////////////////////////

$sql = "select * from Called where appointment='yes'";
$result = $conn->query($sql);


///////////////////////////////////////////////
//////// change names ////////////////////////
///////////////////////////////////////////////

echo "<table><tr><td>agent</td><td>business</td><td>notes</td></tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["agentname"]. "</td><td>" . $row["businessname"]. "</td><td>" . $row["notes"]. "<td></td></tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";
?> 

</body>
</html>