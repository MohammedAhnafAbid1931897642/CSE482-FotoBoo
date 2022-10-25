<?php
session_start();
$email=$_SESSION['email'];
$name=$_POST['name'];

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $stmt = $conn->prepare("UPDATE listings SET name = ? WHERE email = ?");
    $stmt->bind_param("ss", $name, $email);
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();

    echo $name;
    
}


?>
