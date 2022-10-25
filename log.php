<?php
session_start();
$email=$_POST['email'];
$pass=$_POST['pass'];
$status="NO";



// $email="ahnaf.abid22@gmail.com";
// $pass="12345678";
$encrypted_pass=md5($pass);

$checks=0;

if($email==""||$pass==""){
  $checks++;
}

if(strlen($pass)<8||!strpos($email,"@")){
  $checks++;
}

if($checks>0){
  echo("Login failed!");
  header("Location: https://focusbd.xyz/482/login.php");
}else{ if($checks==0){

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $sql = "SELECT * FROM reg";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row['email']==$email && $row['pass']==$encrypted_pass){
            $_SESSION['email']=$email;
            echo ("SUCCESSFULLY LOGGED IN!");
              $conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');
  $sql = "SELECT * FROM paid";
  $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        if($row['email']==$email){
            die(); 
        }
        } 
    }

    $conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');
    $stmt = $conn->prepare("insert into paid(email, status) values(?, ?)");
    $stmt->bind_param("ss", $email, $status);
    $execval = $stmt->execute();


            die();   

        }
      } 
}
echo("LOGIN FAILED! TRY AGAIN");
}





}}
?>