<?php session_start(); ?>
<link rel="stylesheet" href="../Design/css/main.css">
<?php include 'inc/header.php'; ?>
  <?php
      if(!isset($_SESSION['loginVerdi'])) // If session is not set then redirect to Login Page
      {
          header("Location:login.php");  
      }
      
      $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  
      $i = 0;
      
      while($i <= 100) {
        include '../../PHP/inc/event.php';
      $i = $i + 1;
      }
      $conn->close();
    ?>
<?php include 'inc/footer.html';
?>
</div>