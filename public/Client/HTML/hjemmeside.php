<?php session_start(); ?>
<link rel="stylesheet" href="../Design/css/main.css">
<?php include 'inc/header.php'; ?>                        <!-- Hent header.php -->
<h1> Hjemmeside </h1>
<?php
      if(!isset($_SESSION['loginVerdi']))
      {
          header("Location:login.php");  
      }
      
      // koble til db
      $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  
      $i = 0;
      $side = "hjemmeside"; // definer navn på siden

      // hent fra db, maks 100 events
      while($i <= 100) {
        $sql = "SELECT eventID, eventNavn, dato, beskrivelse FROM event WHERE eventID = $i AND dato >= CURDATE()";
        include '../../PHP/inc/event.php';    // hent event.php
      $i = $i + 1;
      }
      $conn->close();
    ?>
<?php include 'inc/footer.html'; 
?><!-- Hent footer.php -->
</div>