<?php

session_start();

if(!isset($_SESSION['email'])){
  header("Location: https://focusbd.xyz/482/login.php");
}

$ses_id=md5($_SESSION['email']);

if(isset($_SESSION['email'])){

    $email=$_SESSION['email'];

    $conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');

if($conn->connect_error){

    echo "$conn->connect_error";

    die("Connection Failed : ". $conn->connect_error);

}

else{
  
  $email=$_SESSION['email'];

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<style>





.messagepop {

  background-color:#FFFFFF;

  border:1px solid #999999;

  cursor:default;

  display:none;

  margin-top: 15px;

  position: absolute;

  left: 900px;

  text-align:left;

  width:394px;

  z-index:50;

  padding: 25px 25px 20px;

}



label {

  display: block;

  margin-bottom: 3px;

  padding-left: 15px;

  text-indent: -15px;

}



.messagepop p, .messagepop.div {

  border-bottom: 1px solid #EFEFEF;

  margin: 2px 0;

  padding-bottom: 8px;

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

          <a href="search.php" class="nav-link">Search</a>

        </li>

      </ul>

      <ul class="navbar-nav">

      <li class="nav-item">

          <a href="profile_creator.php" class="nav-link">  <?php if(isset($_SESSION['email'])&&isset($_COOKIE[$ses_id])){echo $_COOKIE[$ses_id];}else{echo "";}  ?></a>

        </li>         

        <li class="nav-item">

        <a href="profile_creator.php" class="navbar-brand"><object id="pfp2" class="img-fluid img-thumbnail" data="<?php if(isset($_SESSION['email'])&&isset($profile_pic)){echo $profile_pic;}else{echo "images/default_pic.webp";} ?>" type="image/png" width="130px" height="92px"><a> 

        <a href="profile_creator.php" class="navbar-brand"><img id="pfp" class="img-fluid img-thumbnail" src="images/default_pic.webp" alt="profile pic" width="130px" height="92px"></a>

        </object>

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

        <h2>Profile Creator</h2>

        <p class="lead">Here you can create your user profile</p><br>

        <hr>

        <p class="lead">First, upload a profile picture</p>

        <img id="img" class="d-block mx-auto mb-4 img-fluid" src="images/default_pic.webp" alt="" width="250" height="270">

        <form  id="uploadform" method="POST" enctype="multipart/form-data">

  <label for="fileToUpload" style="color:white">Select image to upload:</label>

  <input type="text" name="email" id="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" hidden>

  <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-outline-success">

  <button type='submit' id='upload' name='upload' class="btn btn-outline-success">UPLOAD</button>

</form>

  <hr>

  <form id="setform" method="POST">

  <p class="lead">Now, set a username</p>

  <input type="text" id="uname" name="uname" placeholder="Enter your username" required>

  <div class="messagepop pop">

  <form method="post" id="new_message" action="/messages">

    <p><label for="email">Can we save your username in cookies?</label></p>

    <p><label for="body">Make it easier for us to remember you.</label></p>

    <p><button name="commit" class="btn btn-outline-success selected yes" id="yes">Yes</button> or <button name="commit" class="btn btn-outline-danger selected close" id="no">No</button> </p>

  </form>

</div>

  <br><button type='submit' id='set' name='set' class="btn btn-outline-primary">SET</button>

  <hr>

  

</form>

      </div>

      <div id="contents" class="alert alert-info" role="alert" hidden><button id="hide">Hide</button>

</div>









<script>

//JavaScript starts here

function deselect(e) {

  $('.pop').slideFadeToggle(function() {

    e.removeClass('selected');

  });    

}



$(function() {

  $('#set').on('click', function() {

    if($('#set')) {

      deselect($(this));               

    } else {

      $('.pop').slideFadeToggle();

    }

    return false;

  });



  $('.yes').on('click', function() {

    $("#contents").load("set_cookie.php", function(response, status, xhr) {

  if (status == "success") {

      // alert(msg + xhr.status + " " + xhr.statusText);

      $("#contents").removeAttr("hidden");

      

      alert(msg + xhr.status + " " + xhr.statusText);





  }

  

});

    deselect($('#set'));

    return false;

  });



  $('.close').on('click', function() {

    deselect($('#set'));

    return false;

  });

});







$.fn.slideFadeToggle = function(easing, callback) {

  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);

};



      //JQuery starts here, loads a php script to upload file

 $(document).ready(function() {

  $("#hide").click(function(){$("#contents").hide();});

 

 $("#upload").click(function() {

  var email = $("#email").val();

  event.preventDefault();

  $.ajax({

  url: 'set_dp.php', 

  type: 'POST',

  data: new FormData($('#uploadform')[0]), // The form with the file inputs.

  processData: false,

  contentType: false                    // Using FormData, no need to process data.

}).done(function(){

  var filename = $('input[type=file]').val().split('\\').pop();

//   var dir = "uploads/"+email;

  $("#img").attr("src","uploads/"+email+"/"+filename); // updating profile image on page

  $("#pfp").attr("src","uploads/"+email+"/"+filename);

  $("#pfp2").attr("data","uploads/"+email+"/"+filename);

  alert("Profile pic set successfully!");



  // $("#imageBox").html('<img src="' + this.href + '" />');

}).fail(function(){

  alert("An error occurred, the file couldn't be sent!");

});



 });



 $("#set").click(function() {

    var uname = $("#uname").val();

    event.preventDefault();

    $.post("set_username.php",

    {

      uname: uname,

    },

    function received(data){

      alert(data+" set successfully!");

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