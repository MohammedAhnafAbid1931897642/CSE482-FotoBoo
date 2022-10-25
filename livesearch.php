<?php

$q=$_GET["q"];

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');
  

$sql = "SELECT * FROM listings";

$all = $conn->query($sql);

$results = $all->fetch_all();


$picture=[];
$category=[];
$email=[];
$location=[];
$name=[];


//index 2 is Category, index 4 is Location and index 3 is Email

foreach ($results as $result) {
  if((stristr($result[2],$q))||(stristr($result[4],$q))){
    array_push($picture, $result[1]);
    array_push($category, $result[2]);
    array_push($email, $result[3]);
    array_push($location, $result[4]);
    array_push($name, $result[6]);
    
  }

}


$array=array("picture"=>$picture,"category"=>$category,"email"=>$email,"location"=>$location,"name"=>$name);


// print_r($array);


// print_r($array);

//output the response

echo(json_encode($array, JSON_UNESCAPED_SLASHES));

?>