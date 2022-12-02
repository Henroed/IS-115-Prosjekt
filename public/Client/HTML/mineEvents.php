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
       
       $profileValue = $_SESSION['loginVerdi'];
       $userQuery = "SELECT userID FROM user WHERE tlf = '$profileValue' OR epost = '$profileValue'";

       $userValue = $conn->query($userQuery);

       $userID = $userValue->fetch_assoc();
       $selectValue = $userID["userID"];

       $side = "mineEvents";
      $sql = "SELECT event.eventID, event.eventNavn, event.dato, event.beskrivelse FROM event 
                LEFT JOIN myEvent ON event.eventID=myEvent.eventID WHERE myEvent.userID = '$selectValue' AND event.dato >= CURDATE()";
         include '../../PHP/inc/event.php';

       $conn->close();
     ?>
<?php include "inc/footer.html"; ?>
