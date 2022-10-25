<?php 

session_start();



if(isset($_SESSION['email'])){

  $ses_id=md5($_SESSION['email']);

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

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

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

      <a href="profile_creator.php" class="nav-link">  <?php if(isset($_SESSION['email'])&&isset($_COOKIE[$ses_id])){echo $_COOKIE[$ses_id];}else{echo "";}  ?></a>

        </li>         

        <li class="nav-item">

        <a href="<?php if(isset($_SESSION['email'])){echo "profile_creator.php";}else{echo "login.php";} ?>" class="navbar-brand"><img class="img-fluid img-thumbnail" src="<?php if(isset($_SESSION['email'])&&isset($profile_pic)){echo $profile_pic;}else{echo "images/default_pic.webp";} ?>" alt="profile pic" width="130px" height="92px"></a>

        </li>

        <li class="nav-item">

          <a href="destroy_session.php" class="nav-link" <?php if(isset($_SESSION['email'])){echo "";}else{echo "hidden";} ?>>Logout</a>

        </li>

      </ul>

    </div>

  </nav>



  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image: url('images/bg.webp');">

      <div class="col-md-5 p-lg-5 mx-auto my-5">

        <h1 class="display-4 font-weight-normal">Here's Our Location</h1>

        <p class="lead font-weight-normal">Feel free to drop by anytime for some coffee</p>

        <p class="lead font-weight-normal">Don't worry, it's on us</p>

      </div>

      <div class="product-device box-shadow d-none d-md-block"></div>

      <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>



 

   <section >

      <iframe width="100%" height="720px" class="location border border-white border-6 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.0980918879964!2d90.42336255108486!3d23.815110684481674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1656244966999!5m2!1sen!2sbd"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</section>



           <br>

           <section class="contact-us">

               <div class="row">

                   <div class="contact-col">

                       <div>

                           <i class="fa fa-home"></i>

                           <a href="https://goo.gl/maps/5xRwkbpg95Me1wVg7" class="text-white bg-dark">NSU MAIN CAMPUS ROAD, PLOT# 15 <br>BASHUNDHARA, DHAKA</a>

                       </div>

                       <div>

                           <i class="fa fa-phone"></i>

                           <a href="tel:+88029002738" class="text-white bg-dark">+88029002738 <br></a>

                       </div>

                       <div>

                           <i class="fa fa-envelope"></i>

                           <a href ="mailto: support@fotoboo.com" class="text-white bg-dark">support@fotoboo.com</a>

                       </div>

                   </div>



           </section>

           </div>

  <div class="b-example-divider"></div>

  <footer class="bg-dark text-center text-white">

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