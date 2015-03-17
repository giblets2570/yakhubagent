<?php  

//connect to the database 
include 'vars.php';
$conn = new mysqli($servername, $serverusername, $serverpassword,$db);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        echo "yes to amazon web services<br>";  
    }
// 

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            $conn->query("INSERT INTO Numbers (id, number, businessname, clientname, called, timeCreated) VALUES 
                (NULL,'".addslashes($data[1])."','".addslashes($data[0])."','Dobeo','no',CURRENT_TIMESTAMP) "); 
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

     

} 

?> 