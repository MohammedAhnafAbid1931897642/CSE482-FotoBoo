<?php session_start(); 



if(!isset($_SESSION['email'])){

  header("Location: https://focusbd.xyz/482/login.php");

}





if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];



    $conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');



if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}



else{



    $sql = "SELECT * FROM profiles";



    $result = $conn->query($sql);



    if ($result->num_rows > 0) {



      // output data of each row



      while($row = $result->fetch_assoc()) {



        if($row['email']==$email){



            $profile_pic=$row['profile_pic'];



        }



      } 



}



}



}



$email=$_SESSION['email'];



$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');



if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}



else{



    $sql = "SELECT * FROM paid";



    $result = $conn->query($sql);



    



    if ($result->num_rows > 0) {



      // output data of each row



      while($row = $result->fetch_assoc()) {



        if($row['email']==$email && $row['status']=="NO"){



          echo "<meta http-equiv='refresh' content='0;url=pay_window.php'>";



        }



      } 



}







}



?>



<!DOCTYPE html>



<html lang="en">



<head>



    <meta charset="UTF-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <meta name="description" content="FotoBoo : A website for finding and hiring photographers for your events such as birthdays, weddings and programmes.">



    <title>FotoBoo</title>



    <link rel="icon" type="image" href="images/favicon.webp">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer />



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">



</head>



<body>



  <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">



    <a href="index.php" class="navbar-brand"><img src="images/logo.webp" alt="logo" width="130px" height="92px"></a>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">



      <span class="navbar-toggler-icon"></span>



    </button>



    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">



      <ul class="navbar-nav">



        <li class="nav-item">



          <a href="register.php" class="nav-link">Register</a>



        </li>



        <li class="nav-item">



          <a href="login.php" class="nav-link">Login</a>



        </li>



        <li class="nav-item">



          <a href="contact.php" class="nav-link">Contact</a>



        </li>



      </ul>



      <ul class="navbar-nav">



      <li class="nav-item">



          <a href="profile_creator.php" class="nav-link">  <?php if(isset($_SESSION['email'])){$ses_id=md5($_SESSION['email']);echo $_COOKIE[$ses_id];}else{echo "";}  ?></a>



        </li>         



        <li class="nav-item">



        <a href="profile_creator.php" class="navbar-brand"><img class="img-fluid img-thumbnail" src="<?php if(isset($_SESSION['email'])){echo $profile_pic;} ?>" alt="profile pic" width="130px" height="92px"></a>



        </li>



        <li class="nav-item">



          <a href="destroy_session.php" class="nav-link">Logout</a>



        </li>



    </ul>



    </div>



    



  </nav>







  <div class="container fixed-center">



      <div class="py-5 text-center">



        <a href="index.php"><img class="d-block mx-auto mb-4" src="images/fotoboo_logo.webp" alt="" width="225" height="150"></a>



        <h2>Listing Creator</h2>



        <p class="lead">Create your photographer listing</p><br>



        <hr>



        <p class="lead">First, upload some pictures of your work</p>



        <img id="img" class="d-block mx-auto mb-4 img-fluid" src="images/default_pic.webp" alt="" width="250" height="270">



        <div class="gallery"></div>



        <form  id="uploadform" method="POST" enctype="multipart/form-data">



  <label for="fileToUpload" style="color:white">Select image to upload:</label>



  <input type="text" name="email" id="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" hidden>



  <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-outline-success">



  <button type='submit' id='upload' name='upload' class="btn btn-outline-success">UPLOAD</button>



</form>



<hr>



<form id="setform" method="POST">



  <p class="lead">Now, select your category</p>



  <select class="btn btn-primary dropdown-toggle" name="category" id="category">



    <option value="Wedding">Wedding</option>



    <option value="Birthday">Birthday</option>



    <option value="Fashion">Fashion</option>



    <option value="Advertisement">Advertisement</option>



    <option value="Food">Food</option>



    <option value="Architectural">Architectural</option>



    <option value="Artistic">Artistic</option>



    <option value="Sports">Sports</option>



    <option value="Wildlife">Wildlife</option>



    <option value="Travel">Travel</option>



  </select>



  <button type='submit' id='set' name='set' class="btn btn-outline-primary">SET</button>



  <hr>



</form>



<form id="setform2" method="POST">



  <p class="lead">Now, select your location</p>



  <select class="btn btn-success dropdown-toggle" name="location" id="location">



    <option value="Dhaka">Dhaka</option>



    <option value="Rajshahi">Rajshahi</option>



    <option value="Khulna">Khulna</option>



    <option value="Barisal">Barisal</option>



    <option value="Sylhet">Sylhet</option>



    <option value="Chittagong">Chittagong</option>



    <option value="Rangpur">Rangpur</option>



    <option value="Mymensingh">Mymensingh</option>



  </select>



  <button type='submit' id='set2' name='set2' class="btn btn-outline-primary">SET</button>



  <hr>



</form>



<form id="setform3" method="POST">



  <p class="lead">Now, set a name</p>



  <input type="text" id="name" name="name" placeholder="Enter your name" required>



  <button type='submit' id='set3' name='set3' class="btn btn-outline-primary">SET</button>



  <hr>



  



</form>



      </div>











      <script>



      //JQuery starts here, loads a php script to upload file



 $(document).ready(function() {



 



 $("#upload").click(function() {



  var email = $("#email").val();



  event.preventDefault();



  $.ajax({



  url: 'images_upload.php', 



  type: 'POST',



  data: new FormData($('#uploadform')[0]), // The form with the file inputs.



  processData: false,



  contentType: false                    // Using FormData, no need to process data.




}).done(function(){




  var filename = $('input[type=file]').val().split('\\').pop();



//   var dir = "uploads/"+email;



  $("#img").attr("src","listings/"+email+"/"+filename); // updating profile image on page







  alert(filename+" Image uploaded successfully!");







  // $("#imageBox").html('<img src="' + this.href + '" />');



}).fail(function(){



  alert("An error occurred, the file couldn't be sent!");



});







 });







 $("#set").click(function() {



    var category = $("#category").val();



    event.preventDefault();



    $.post("set_category.php",



    {



      category: category,



    },



    function received(data){



      alert(data);



      return false;



    });



 });







 $("#set2").click(function() {



    var location = $("#location").val();



    event.preventDefault();



    $.post("set_location.php",



    {



      location: location,



    },



    function received(data){



      alert(data);



      return false;



    });



 });







 $("#set3").click(function() {



    var name = $("#name").val();



    event.preventDefault();



    $.post("set_name.php",



    {



      name: name,



    },



    function received(data){



      alert("Name set successfully!");



      return false;



    });



 });















 });







 











 </script>



      



        







  <footer class="bg-dark text-center text-white fixed-relative">



  <!-- Grid container -->



  <div class="container p-4 pb-0">



    <!-- Section: Social media -->



    <section class="mb-4">



      <!-- Facebook -->



      <a class="btn btn-outline-light btn-floating m-1" href="facebook.com" role="button"



        ><i class="fab fa-facebook-f"></i



      ></a>







      <!-- Twitter -->



      <a class="btn btn-outline-light btn-floating m-1" href="twitter.com" role="button"



        ><i class="fab fa-twitter"></i



      ></a>







      <!-- Google -->



      <a class="btn btn-outline-light btn-floating m-1" href="google.com" role="button"



        ><i class="fab fa-google"></i



      ></a>







      <!-- Instagram -->



      <a class="btn btn-outline-light btn-floating m-1" href="instagram.com" role="button"



        ><i class="fab fa-instagram"></i



      ></a>







      <!-- Linkedin -->



      <a class="btn btn-outline-light btn-floating m-1" href="linkedin.com" role="button"



        ><i class="fab fa-linkedin-in"></i



      ></a>







      <!-- Github -->



      <a class="btn btn-outline-light btn-floating m-1" href="github.com" role="button"



        ><i class="fab fa-github"></i



      ></a>



    </section>



    <!-- Section: Social media -->



  </div>



  <!-- Grid container -->







  <!-- Copyright -->



  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">



    © 2022 Copyright:



    <a class="text-white" href="">Group 3</a>



  </div>



  <!-- Copyright -->



</footer>







</body>























</html>