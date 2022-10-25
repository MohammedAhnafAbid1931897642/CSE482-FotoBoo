<?php 







session_start(); 



if(!isset($_SESSION['email'])){

  header("Location: https://focusbd.xyz/482/login.php");

}



if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];



    $ses_id=md5($_SESSION['email']);



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


          header("Location: https://focusbd.xyz/482/pay_window.php");
          



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



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>







    <style>



.box1 {

    display: block;

    padding: 10px;

    margin-bottom: 100px; /* SIMPLY SET THIS PROPERTY AS MUCH AS YOU WANT. This changes the space below box1 */

    text-align: justify;

}



      .bd-placeholder-img {



        font-size: 1.125rem;



        text-anchor: middle;



        -webkit-user-select: none;



        -moz-user-select: none;



        user-select: none;



      }







      @media (min-width: 768px) {



        .bd-placeholder-img-lg {



          font-size: 3.5rem;



        }



      }



    </style>



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



          <a href="destroy_session.php" class="nav-link">Logout</a>



        </li>



      </ul>



    </div>



  </nav>



  <!-- Navbar ends here -->



  







  <div class="container py-4">



    <header class="pb-3 mb-4 border-bottom">



      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">



        <span class="fs-4">Search your favourite photographers</span>



      </a>



    </header>







    <div class="p-5 mb-4 rounded-3 text-white bg-dark">



      <div class="container-fluid py-5">



        <h1 class="display-5 fw-bold">Photographers are only a click away</h1>



        <p class="col-md-8 fs-4">Use our awesome search engine</p>



        <div class="input-group rounded">



  <input onkeyup="showResult(this.value)" type="text" id="livesearch" class="form-control rounded" placeholder="Search by category or location..." aria-label="Search" aria-describedby="search-addon"  />



</div>



      </div>



    </div>











    <div class="album py-5 bg-light">



    <div class="container">



      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



        <div id="obj">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted">Location</small>



              </div>



            </div>



          </div>



          </a>



        </div>



        



      </div>



      <div id="obj2">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted">Location</small>



              </div>



            </div>



          </div>



          </a>



        </div>



        



      </div>



      <div id="obj3">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted">Location</small>



              </div>



            </div>



          </div>



          </a>



        </div>



        



      </div>

    </div>



    </div>

  </div>











 





















<footer class="bg-dark text-center text-white" style="    position: fixed;

    height: 75px;

    bottom: 0px;

    left: 0px;

    right: 0px;

    margin-bottom: 0px;">



<!-- Grid container -->







  <!-- Section: Social media -->



  <section class="mb-4">



    <!-- Facebook -->



    <a class="btn btn-outline-light btn-floating m-1" href="facebook.com" role="button"



      ><i class="fa-brands fa-square-facebook"></i></a>







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



    <br><a href="#" style="color:white;">Designed by Group 3</a>



  </section>



  <!-- Section: Social media -->



<!-- Grid container -->



</footer>







<script>



$(document).ready(function(){



  $("#obj").hide();

  $("#obj2").hide();

  $("#obj3").hide();



});











function showResult(str) {



  if (str.length==0) {



    $("#obj").hide();

    $("#obj2").hide();

    $("#obj3").hide();



    return;



  }



  var xmlhttp=new XMLHttpRequest();



  xmlhttp.open("GET","livesearch.php?q="+str,true);



  xmlhttp.send();



  xmlhttp.onreadystatechange=function() {



    if (this.readyState==4 && this.status==200) {



      const Obj = JSON.parse(this.responseText);



      $("#obj").show();



      $("#obj2").show();



      $("#obj3").show();



      $("#obj p").text(Obj.name[0]);



      $("#obj small").text(Obj.location[0]);



      $("#obj #cat").text(Obj.category[0]);



      $("#obj #thumb").attr("src", Obj.picture[0]);



      $("#obj #port").attr("href", "portfolio.php?q="+Obj.email[0]);



      $("#obj2 p").text(Obj.name[1]);



      $("#obj2 small").text(Obj.location[1]);



      $("#obj2 #cat").text(Obj.category[1]);



      $("#obj2 #thumb").attr("src", Obj.picture[1]);



      $("#obj2 #port").attr("href", "portfolio.php?q="+Obj.email[1]);



      $("#obj3 p").text(Obj.name[2]);



      $("#obj3 small").text(Obj.location[2]);



      $("#obj3 #cat").text(Obj.category[2]);



      $("#obj3 #thumb").attr("src", Obj.picture[2]);



      $("#obj3 #port").attr("href", "portfolio.php?q="+Obj.email[2]);







    }



}



}



</script>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer />



</body>























</html>