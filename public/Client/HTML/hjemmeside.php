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
      
      $side = "hjemmeside"; // definer navn på siden

      require_once('inc/filter.html'); 

      // hent fra db
        if (isset($_GET['filter'])) {
          
          $filter = $_GET["filter"];

          $sql = "SELECT eventID, eventNavn, dato, beskrivelse, lokasjon, eventType FROM event WHERE dato >= CURDATE() AND eventType = '$filter'";
          include '../../PHP/inc/event.php';    // hent event.php

        } else {

        $sql = "SELECT eventID, eventNavn, dato, beskrivelse, lokasjon, eventType FROM event WHERE dato >= CURDATE()";
        include '../../PHP/inc/event.php';    // hent event.php

        }
      $conn->close();
    ?>
</div>