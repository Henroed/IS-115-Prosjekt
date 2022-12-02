<?php session_start(); ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
<link rel="stylesheet" href="../Design/css/main.css">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'inc/header.php'; ?>
  <div class="container">
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Event navn</span>
            <input type="text" name="eventNavn" value="SnikkSnakk" required>
          </div>
          <div class="input-box">
            <span class="details">Event dato</span>
            <input type="date" name="dato">
          </div>
          <div class="input-box">
            <span class="details">Beskrivelse</span>
            <input type="textarea" rows="4" cols="50" name="beskrivelse" value="Ting tang" required>
          </div>
          <div class="input-box">
            <span class="details">Bilde</span>
            <input type="file" name="bilde">
          </div>
        <div class="button">
          <input type="submit" value="Lag Event">
        </div>
      </form>

      <?php 

        if (isset($_POST["eventNavn"]) && isset($_POST["dato"]) && isset($_POST["beskrivelse"])) {
        require_once('../../../private/Database/inc/db_connect.php');

        $sql = "INSERT INTO event (eventNavn, dato, beskrivelse) VALUES (:eventNavn, :dato, :beskrivelse)";  
        
        $q = $pdo->prepare($sql);
    
        $q->bindParam(':eventNavn', $eventNavn, PDO::PARAM_STR);
        $q->bindParam(':dato', $dato, PDO::PARAM_STR);
        $q->bindParam(':beskrivelse', $beskrivelse, PDO::PARAM_STR);
    
        $eventNavn = $_POST["eventNavn"];
        $dato = $_POST["dato"];
        $beskrivelse = $_POST["beskrivelse"];
    
    try {
        $q->execute();
    exit();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>";
    }
    
    if($pdo->lastInsertId() > 0) {
      echo "Data satt i databasen, identifisert med UID " . $pdo->lastInsertId() . ".";
  } else {
      echo "Data ikke satt i databasen.";
  }

    }
      ?>
    </div>
  </div>
  <?php include "inc/footer.html";
        if(!isset($_SESSION['loginVerdi']))
        {
            header("Location:login.php");  
        }
  ?>
</body>
</html>