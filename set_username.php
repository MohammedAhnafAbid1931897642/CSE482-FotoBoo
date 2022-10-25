<?php
session_start();
$email=$_SESSION['email'];
$uname=$_POST['uname'];

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $stmt = $conn->prepare("UPDATE profiles SET uname = ? WHERE email = ?");
    $stmt->bind_param("ss", $uname, $email);
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();

    echo $uname;
    
}


?>
