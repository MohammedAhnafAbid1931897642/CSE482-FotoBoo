<?php

$servername = "192.168.10.5";
$username = "focusbdx_demo1";
$pass = "XHQsAJV#7zZT";
$dbname = "focusbdx_fotoboo";

$conn = mysqli_connect($servername, $username, $pass, $dbname);



if($conn)
{
    $name="ahnaf";
    $epass="1234";
    $cpass="1234";
    echo "<h1> we are connected to database </h1>";
    $stmt = $conn->prepare("insert into demo1(name, epass, cpass) values(?,?,?)");
    $stmt->bind_param("sss", $name, $epass, $cpass);
	$execval = $stmt->execute();
	
	
	
	
    //writing query for fetching everything from database
    $sql = "SELECT * FROM demo1";


    //making query and getting result
    $db_email = mysqli_query($conn, $sql);


    //fetching the resulting rows as array
    $registration = mysqli_fetch_all($db_email, MYSQLI_ASSOC);
    
    //FETCHING NAME, BIO & CONTACT FROM PORTFOLIO
    foreach($registration as $reg){

        
        echo $reg['name'];
        echo "<br>";
        echo $reg['epass'];
        echo "<br>";
        echo $reg['cpass'];
        echo "<br>";
 

    }



	$stmt->close();
	$conn->close();
}
else
{
    echo "<h1> we are not connected to database </h1>";
    $conn->close();
}

?>