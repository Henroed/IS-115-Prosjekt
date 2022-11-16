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

</body>
</html>