<?php

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');

$pic="s"; 
$category="s"; 
$email="s";
$location="s";
$profile_pic="s";
$name="s";

if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into listings(pic, category, email, location, profile_pic, name) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $pic, $category, $email, $location, $profile_pic, $name);
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();
    echo $pic.$category.$email.$location.$profile_pic.$name;
}




?>