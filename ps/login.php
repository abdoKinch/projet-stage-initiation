<?php
session_start();
$message="";
include("connexion/connexion.php");
if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    header("Location:dashboard/produit.php");
}elseif(isset($_POST['email']) && isset($_POST['password'])){
  include("login-verification/login-verification.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login-style/fonts/icomoon/style.css">

    <link rel="stylesheet" href="login-style/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login-style/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="login-style/css/style.css">

    <title>Jorf Fertilizers</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('login-style/images/20160309_AFC_JORF_92.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Sign In</h3>
            </div>
            <form action="login.php" method="post">
              <div class="form-group first">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>

              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                
              </div>
              <p><?php
              if($message!=""){
                echo $message;
              }
              ?>
              </p>
              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="login-style/js/jquery-3.3.1.min.js"></script>
    <script src="login-style/js/popper.min.js"></script>
    <script src="login-style/js/bootstrap.min.js"></script>
    <script src="login-style/js/main.js"></script>
  </body>
</html>
