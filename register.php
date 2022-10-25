

<!doctype html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="fotoboo registration">

    <meta name="author" content="fotoboo">

    <link rel="icon" type="image" href="images/favicon.webp">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous' defer></script>

    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Registration</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link href="floating-labels.css" rel="stylesheet">

    <style>

      .error_form

{

	top: 12px;

	color: rgb(216, 15, 15);

    font-size: 15px;

    font-family: Helvetica;

}

.container input:focus,

.container input:valid

{

	border-bottom: 2px solid rgb(66,133,244);

}

    </style>

  </head>



  <body>



   

    <form id="registration_form" class="form-signin position-relative">

      <div class="text-center mb-4">

        <a href="index.php"><img class="mb-4" src="images/fotoboo_logo.webp" alt="logo" width="325" height="200"></a>

        <h1 class="h3 mb-3 font-weight-normal">Registration</h1>

      </div>

      

      <div class="form-label-group">

        <input type="email" id="form_email" name="form_email" class="form-control" placeholder="Email address" required autofocus>

        <label for="form_email">Email address</label>

        <span class="error_form" id="email_error_message"></span>

      </div>



      <div class="form-label-group">

        <input type="password" id="form_password" name="form_password" class="form-control" placeholder="Password" minlength="8" required>

        <label for="form_password">Password</label>

        <span class="error_form" id="password_error_message"></span>

      </div>



      

      <div class="form-label-group">

        <input type="password" id="form_retype_password" name="form_retype_password" class="form-control" placeholder="Password" minlength="8" required>

        <label for="form_retype_password">Confirm Password</label>

        <span class="error_form" id="retype_password_error_message"></span>

      </div>



      

      <div class="d-flex justify-content-center"><button id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button></div>

      <br><p class="lead font-weight-normal">Already have an account? <a href="login.php">Login instead</a></p>

      

    </form>

    <br>

    

    

    





    



    

<script>





$(document).ready(function(){



   var error_password;

   var error_retype_password;

   var error_email;



   



$("#form_email").focus(function(){

$(this).css("background-color", "yellow");

});

$("#form_email").focusout(function(){

check_email();

   });



   $("#form_password").focus(function(){

$(this).css("background-color", "yellow");

});

$("#form_password").focusout(function(){

check_password();

   });

   

   $("#form_retype_password").focus(function(){

$(this).css("background-color", "yellow");

});

$("#form_retype_password").focusout(function(){

check_retype_password();

   });



   function check_password() {

      var password_length = $("#form_password").val().length;

      if (password_length < 8) {

         $("#password_error_message").html("At least 8 characters");

         $("#password_error_message").show();

         $("#form_password").css("border-bottom","2px solid #F90A0A");

         error_password = true;

         

         

      } else {

         $("#password_error_message").hide();

         $("#form_password").css("border-bottom","2px solid #34F458");

      }

   }



   function check_retype_password() {

      var password = $("#form_password").val();

      var retype_password = $("#form_retype_password").val();

      if (password !== retype_password) {

         $("#retype_password_error_message").html("Passwords don't match");

         $("#retype_password_error_message").show();

         $("#form_retype_password").css("border-bottom","2px solid #F90A0A");

         error_retype_password = true;

         

      } else {

         $("#retype_password_error_message").hide();

         $("#form_retype_password").css("border-bottom","2px solid #34F458");

      }

   }



   function check_email() {

      var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

      var email = $("#form_email").val();

      if (pattern.test(email) && email !== '') {

         $("#email_error_message").hide();

         $("#form_email").css("border-bottom","2px solid #34F458");

         

      } else {

         $("#email_error_message").html("Invalid Email: Follow example@example.com");

         $("#email_error_message").show();

         $("#form_email").css("border-bottom","2px solid #F90A0A");

         error_email = true;

      }

   }







   $("button").click(function send_form_data(){

    event.preventDefault();

      var email = $("#form_email").val();

      var pass = $("#form_password").val();

      

      $.post("reg.php",

{

email: email,

pass: pass 

},

function received(data,status){

alert(data);

if(data=="REGISTRATION SUCCESSFUL!"){

   window.location.href="login.php";

}

});

});



   });











</script>



  </body>

</html>

