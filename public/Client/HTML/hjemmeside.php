<?php session_start(); ?>
<link rel="stylesheet" href="../Design/css/main.css">
<?php include 'inc/header.php'; ?>
<h1> Hjemmeside </h1>
<?php
      if(!isset($_SESSION['loginVerdi']))
      {
          header("Location:login.php");  
      }
      
      $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  
      $i = 0;
      $side = "hjemmeside";

      while($i <= 100) {
        $sql = "SELECT eventID, eventNavn, dato, beskrivelse FROM event WHERE eventID = $i AND dato >= CURDATE()";
        include '../../PHP/inc/event.php';
      $i = $i + 1;
      }
      $conn->close();
    ?>
<?php include 'inc/footer.html';
?>
</div>