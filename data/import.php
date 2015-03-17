<?php  

include 'vars.php';

$conn = new mysqli($servername, $serverusername, $serverpassword,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    echo "yes to amazon web services<br>";  
}

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     

     // id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     //    number VARCHAR(100) NOT NULL,
     //    businessname VARCHAR(100) NOT NULL,
     //    clientname VARCHAR(100) references Client(name),
     //    called VARCHAR(100) NOT NULL,
     //    timeCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            $conn->query("INSERT INTO Numbers (id, number, businessname, address, website, clientname, called, timeCreated) VALUES 
                (   
                    NULL,
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."', 
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    CURRENT_TIMESTAMP
                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location: import.php?success=1'); die; 

} 

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
        <title>Import a CSV File with PHP and MySQL</title> 
    </head> 

    <body> 

    <?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
        Choose your file: <br /> 
        <input name="csv" type="file" id="csv" /> 
        <input type="submit" name="Submit" value="Submit" /> 
    </form> 

    </body> 
</html> 
