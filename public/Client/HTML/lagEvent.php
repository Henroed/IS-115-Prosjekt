<?php session_start(); ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
<link rel="stylesheet" href="../Design/css/registrer.css">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'inc/header.html'; ?>
  <div class="container">
  <h1>Planlegg ett nytt event </h1>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Event navn</span>
            <input type="text" name="eventNavn" placeholder="Navn på event" required>
          </div>
          <div class="input-box">
            <span class="details">Event dato</span>
            <input type="date" name="dato" required>
          </div>
          <div class="input-box">
            <span class="details">Beskrivelse</span>
            <input type="textarea" rows="4" cols="50" name="beskrivelse" placeholder="Kort beskrivelse av eventen" required>
          </div>
          <div class="input-box">
            <span class="details">Lokasjon</span>
            <input type="textarea" name="lokasjon" placeholder="Hvor eventen skal holdes" required>
          </div>
          <div class="input-box">
            <span class="details">Event type</span>
            <select id="eventType" name="eventType">
                <option value="fest">Fest</option>
                <option value="konferanse">Konferanse</option>
                <option value="samling">Samling</option>
            </select>
          </div>
          <div class="button">
          <input type="submit" value="Lag event">
        </div>
      </form>

      <?php 
          //Kriterie for db kobling
        if (isset($_POST["eventNavn"]) && isset($_POST["dato"]) && isset($_POST["beskrivelse"])  && isset($_POST["lokasjon"])) {
        require_once('../../../private/Database/inc/db_connect.php');

        // hent fra db
        $sql = "INSERT INTO event (eventNavn, dato, beskrivelse, lokasjon, eventType) VALUES (:eventNavn, :dato, :beskrivelse, :lokasjon, :eventType)";  
        $q = $pdo->prepare($sql);

          // koble db-navn til parametere, oversett til SQL
        $q->bindParam(':eventNavn', $eventNavn, PDO::PARAM_STR);
        $q->bindParam(':dato', $dato, PDO::PARAM_STR);
        $q->bindParam(':beskrivelse', $beskrivelse, PDO::PARAM_STR);
        $q->bindParam(':lokasjon', $lokasjon, PDO::PARAM_STR);
        $q->bindParam(':eventType', $eventType, PDO::PARAM_STR);
    
        // definer verdier fra db 
        $eventNavn = $_POST["eventNavn"];
        $dato = $_POST["dato"];
        $beskrivelse = $_POST["beskrivelse"];
        $lokasjon = $_POST["lokasjon"];
        $eventType = $_POST["eventType"];

    
        // feilmeldinger
    try {
        $q->execute();
        header("Location:hjemmeside.php"); 
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
  <?php
        if(!isset($_SESSION['loginVerdi']))
        {
            header("Location:login.php");  
        }
  ?>
</body>
</html>