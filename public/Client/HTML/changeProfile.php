<?php session_start(); 
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase"); 
    ?> 
    <!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Design/css/registrer.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registrer</div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fornavn</span>
            <input type="text" name="Fornavn" value="Chris" required>
          </div>
          <div class="input-box">
            <span class="details">Etternavn</span>
            <input type="text" name="Etternavn" value="Martin">
          </div>
          <div class="input-box">
            <span class="details">Epost</span>
            <input type="text" name="Epost" value="Chris@mail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Tlf nummer</span>
            <input type="text" name="Tlf" value="12345678" required>
          </div>
          <div class="input-box">
            <span class="details">By</span>
            <input type="text" name="City" value="Kristiansand" required>
          </div>
          <div class="input-box">
            <span class="details">Zip-kode</span>
            <input type="text" name="Zip" value="4623" required>
          </div>
          <div class="input-box">
            <span class="details">Passord</span>
            <input type="text" name="Passord" value="dsaoass" placeholder="Skriv inn passord" required>
          </div>
          <div class="input-box">
            <span class="details">Bekreft passord</span>
            <input type="text" placeholder="Gjenta ditt passord" >
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Kjønn</span>
          <div class="category">
            <label for="dot-1" value="Mann">
            <span class="dot one"></span>
            <span class="gender">Mann</span>
          </label>
          <label for="dot-2" value="Dame">
            <span class="dot two"></span>
            <span class="gender">Dame</span>
          </label>
          <label for="dot-3" value="annet">
            <span class="dot three"></span>
            <span class="gender">Annet</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Lagre endret innformasjon"></input>
        </div>
      </form>

      <?php

if(isset($_POST['Lagre endret innformasjon'])){

    require_once('../../../private/Database/inc/db_connect.php'); 

    $q = $pdo->prepare($sql);
    
    $q->bindParam(':Fornavn', $fornavn, PDO::PARAM_STR);
    $q->bindParam(':Etternavn', $etternavn, PDO::PARAM_STR);
    $q->bindParam(':Tlf', $tlf, PDO::PARAM_INT);
    $q->bindParam(':Epost', $epost, PDO::PARAM_STR);
    $q->bindParam(':City', $city, PDO::PARAM_STR);
    $q->bindParam(':Zip', $zip, PDO::PARAM_INT);
    $q->bindParam(':Passord', $passord, PDO::PARAM_STR);

    $fornavn = $_POST["Fornavn"];
    $Etternavn = $_POST["Etternavn"];
    $epost = $_POST["Epost"];
    $tlf = $_POST["Tlf"];
    $city = $_POST["City"];
    $zip = $_POST["Zip"];
    $passord = $_POST["Passord"];
    
    $sql = "UPDATE user set Fornavn='$fornavn', Etternavn='$etternavn', Tlf='$tlf', Epost='$epost' WHERE userID='$student_id'";

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }

    //$q->debugDumpParams();
      
    if($q->rowCount() > 0) {
        echo $q->rowCount() . " record" . ($q->rowCount() != 1 ? "s were " : " was ") . "updated.";
    } elseif($q->rowCount() == 0) {
        echo "The record was not updated (no change).";
    } else {
        echo "The record was not updated.";
    }

    }
    $conn->close();

?>
    </div>
  </div>

</body>
</html>