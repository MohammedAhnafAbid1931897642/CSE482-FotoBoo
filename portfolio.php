<?php 

session_start();

if(!isset($_SESSION['email'])){
  header("Location: https://focusbd.xyz/482/login.php");
}


$port_email=$_GET["q"];

$pic=[];

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

if(isset($_SESSION['email'])){

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

      if($row['email']==$port_email){

          array_push($pic,$row['pic']);

          $category=$row['category'];

          $location=$row['location'];

          $name=$row['name'];

          $port_pic=$row['profile_pic'];

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

        <li class="nav-item">

          <a href="search.php" class="nav-link" <?php if(isset($_SESSION['email'])){echo "";}else{echo "hidden";} ?>>Search</a>

        </li>

        <li class="nav-item">

          <a href="listing_creator.php" class="nav-link" <?php if(isset($_SESSION['email'])){echo "";}else{echo "hidden";} ?>>Create listing</a>

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

  <div class="b-example-divider"></div>



<div class="container px-4 py-5" id="custom-cards">

<h2 class="pb-2 border-bottom">Welcome to <?php echo $name."'s"." profile!"; ?></h2>

<img id="img" class="d-block mx-auto mb-4 img-fluid" src="<?php echo $port_pic ?>" alt="" width="250" height="270">

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">



    </div>





</div>

</div>

</div>



<div class="b-example-divider"></div>



    <div class="container px-4 py-5" id="custom-cards">

    <h2 class="pb-2 border-bottom">Portfolio</h2>



    <div class="container">

  <div class="row">

    <?php foreach($pic as $p){

         echo '

      <div class="col">

      <img id="img" class="img-fluid" src="'.$p.'" alt="" style="max-width:100%;height:auto;">

    </div>

      ';

    }?>

    

  </div>

</div>











    

  </div>







  <div class="b-example-divider"></div>



    <div class="container px-4 py-5" id="custom-cards">

    <h2 class="pb-2 border-bottom">Category</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

          <?php echo '<h3 class="pb-2 text-primary">'.$category.'</h3>' ?>

        </div>





    </div>

  </div>

</div>



<div class="b-example-divider"></div>



<div class="container px-4 py-5" id="custom-cards">

<h2 class="pb-2 border-bottom">Location</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

      <?php echo '<h3 class="pb-2 text-success">'.$location.'</h3>' ?>

    </div>





</div>

</div>

</div>



<div class="b-example-divider"></div>



<div class="container px-4 py-5" id="custom-cards">

<h2 class="pb-2 border-bottom">Contact</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

      <?php echo '<h3 class="pb-2 text-info">'.$port_email.'</h3>' ?>

    </div>





</div>

</div>

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

    <a class="text-white" href="#">Group 3</a>

  </div>

  <!-- Copyright -->

</footer>



</body>











</html>