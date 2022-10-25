<?php

session_start();
$pic=[];
$category="[PLACEHOLDER]";
$location="[PLACEHOLDER]";
$profile_pic="[PLACEHOLDER]";
$name="[PLACEHOLDER]";
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
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
            array_push($pic,$row['pic']);
            $category=$row['category'];
            $location=$row['location'];
            $profile_pic=$row['profile_pic'];
            $name=$row['name'];
        }
      } 
}
}
}




$pages = simplexml_load_file('links.xml');
$page = $pages->addChild('link');
for($i=0;$i<count($pic);$i++){
    $page->addChild('pic'.$i, $pic[$i]);
}
$page->addChild('email', $email);
$page->addChild('category', $category);
$page->addChild('location', $location);
$page->addChild('name', $name);

file_put_contents('links.xml', $pages->asXML());

echo "Listing generated successfully!";

    

?>