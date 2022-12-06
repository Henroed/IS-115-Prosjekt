<?php session_start(); ?>
<link rel="stylesheet" href="../Design/css/main.css">
<?php include 'inc/header.html'; ?>       <!-- Hent header.php -->
<h1>Mine events </h1>
<?php
      if(!isset($_SESSION['loginVerdi'])) // If session is not set then redirect to Login Page
      {
          header("Location:login.php");  
      }
      
      // koble til db
       $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

       // koble til profil, hent i db
       $profileValue = $_SESSION['loginVerdi'];
       $userQuery = "SELECT userID FROM user WHERE tlf = '$profileValue' OR epost = '$profileValue'";

       $userValue = $conn->query($userQuery);

       $userID = $userValue->fetch_assoc();
       $selectValue = $userID["userID"];

       $side = "mineEvents";    // definere navn på siden

       require_once('inc/filter.html'); 

       // hente event i db
       if (isset($_GET['filter'])) {
          
        $filter = $_GET["filter"];

        $sql = "SELECT event.eventID, event.eventNavn, event.dato, event.beskrivelse, event.lokasjon, event.eventType FROM event 
                LEFT JOIN myEvent ON event.eventID=myEvent.eventID WHERE myEvent.userID = '$selectValue' AND event.dato >= CURDATE() AND eventType = '$filter'";
        include '../../PHP/inc/event.php';    // hent event.php

      } else {
      $sql = "SELECT event.eventID, event.eventNavn, event.dato, event.beskrivelse, event.lokasjon, event.eventType FROM event 
                LEFT JOIN myEvent ON event.eventID=myEvent.eventID WHERE myEvent.userID = '$selectValue' AND event.dato >= CURDATE()";
         include '../../PHP/inc/event.php';   // hent event.php

      }
       $conn->close();
     ?>
