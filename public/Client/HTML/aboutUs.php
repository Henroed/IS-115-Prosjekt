<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../Design/css/registrer.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'inc/header.html'; ?>

  <?php include "inc/footer.html";
        if(!isset($_SESSION['loginVerdi'])) // If session is not set then redirect to Login Page
        {
            header("Location:login.php");  
        }
  ?>

    <link rel="stylesheet" href="../Design/css/registrer.css">
<?php include 'inc/header.html' ?>
  <div class="container">
    <div class="title">Min profil</div>
    <div class="content">
      <h1>Det <br> var <br> en <br> gang <br> en <br> jente <br> som <br> het <br> Silje <br></h2>
    </div>
</div>
<?php include "inc/footer.html" ?>
</body>
</html>