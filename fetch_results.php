<?php

$email=$_GET["q"];
$pic="";
$category="";
$location="";
$name="";
$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $sql = "SELECT * FROM listings";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row['email']==$email){
            $pic=$row['pic'];
            $category=$row['category'];
            $location=$row['location'];
            $name=$row['name'];
            break;
        }
      } 
}
$array['pic']=$pic;
$array['category']=$category;
$array['location']=$location;
$array['name']=$name;
echo(json_encode($array, JSON_UNESCAPED_SLASHES));
}




?>