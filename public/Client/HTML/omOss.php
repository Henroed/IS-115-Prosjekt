<?php session_start(); ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Design/css/registrer.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'inc/header.php'; ?>

  <?php include "inc/footer.html";
        if(!isset($_SESSION['loginVerdi']))
        {
            header("Location:login.php");  
        }
  ?>
  <div class="container">
    <div class="title">Om oss</div>
    <div class="content">
      <h1>Det <br> var <br> en <br> gang <br> en <br> jente <br> som <br> het <br> Silje <br></h2>
    </div>
</div>
<?php include "inc/footer.html" ?>
</body>
</html>