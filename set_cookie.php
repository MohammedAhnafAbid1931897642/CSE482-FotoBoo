<?php

session_start();

$email=$_SESSION['email'];

$ses_id=md5($email);

$cookie_name = $ses_id;

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');

$sql = "SELECT * FROM profiles";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {

    if($row['email']==$email){

     $name=$row['uname'];

     $cookie_value = $name;

     setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "https://focusbd.xyz/482"); // 86400 = 1 day // 86500*365 means username remembered for a year

     echo "Cookies set successfully!";

     die();

    }

  } 

}

// echo "Cookies setting failed!";
echo($_COOKIE[$ses_id]);

?>

