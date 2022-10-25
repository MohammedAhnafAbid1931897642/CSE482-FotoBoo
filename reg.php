<?php







session_start();



$email=$_POST['email'];



$pass=$_POST['pass'];









$status="NO";



$checks=0;



if($email==""||$pass==""){

  $checks++;

}



if(strlen($pass)<8||!strpos($email,"@")){

  $checks++;

}



if($checks>0){

  echo("Registration failed!");

  header("Location: https://focusbd.xyz/482/register.php");

}else{ if($checks==0){







$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');



if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}



else{



    $sql = "SELECT email FROM reg";



    $result = $conn->query($sql);



    if ($result->num_rows > 0) {



      // output data of each row



      while($row = $result->fetch_assoc()) {



        if($row['email']==$email){



            echo ("ERROR: EMAIL ALREADY EXISTS!");



            die();







            







        }



      }



}



    $encrypted_pass=md5($pass);



    $stmt = $conn->prepare("insert into reg(email, pass) values(?, ?)");



    $stmt->bind_param("ss", $email, $encrypted_pass);



    $execval = $stmt->execute();




    echo("REGISTRATION SUCCESSFUL!");



    $stmt->close();



    $conn->close();



}



}}















?>