<?php session_start(); ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Design/css/registrer.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registrer deg</div>
    <div class="content">
      <form action="register.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fornavn</span>
            <input type="text" name="fornavn" placeholder="Skriv inn fornavnet ditt" required>
          </div>
          <div class="input-box">
            <span class="details">Etternavn</span>
            <input type="text" name="etternavn" placeholder="Skriv inn etternavnet ditt" required>
          </div>
          <div class="input-box">
            <span class="details">Epost</span>
            <input type="text" name="epost" placeholder="Skriv inn eposten din" required>
          </div>
          <div class="input-box">
            <span class="details">Tlf nummer</span>
            <input type="text" name="tlf" placeholder="Skriv inn telefonnummeret ditt" required>
          </div>
          <div class="input-box">
            <span class="details">By</span>
            <input type="text" name="city" placeholder="Skriv inn hjembyen din" required>
          </div>
          <div class="input-box">
            <span class="details">Zip-kode</span>
            <input type="text" name="zip" placeholder="Skriv inn postnummeret til byen" required>
          </div>
          <div class="input-box">
            <span class="details">Passord</span>
            <input type="text" name="passord" placeholder="Skriv inn passord" required>
          </div>
          <div class="input-box">
            <span class="details">Bekreft passord</span> 
            <input type="text" name="passordBekreft" placeholder="Gjenta passord" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
          <div class="login">Allerede registrert? <a href="login.php">Logg inn her</a></div>
        </div>
      </form>

      <?php 
        if(isset($_SESSION['loginVerdi'])) {
          header("Location:hjemmeside.php"); 
            }

        require_once('../../PHP/inc/kryptering.php');

         //Kriterie for db kobling
        if (isset($_POST["fornavn"]) && isset($_POST["epost"]) && isset($_POST["passord"])) {

          // definer verdier fra db 
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $epost = $_POST["epost"];
        $tlf = $_POST["tlf"];
        $city = $_POST["city"];
        $zip = $_POST["zip"];
        $passord = $_POST["passord"];
        $passordBekreft = $_POST["passordBekreft"];

        $cipherPassord = Krypter($passord, 3);

        if ($passord == $passordBekreft) {
        require_once('../../../private/Database/inc/db_connect.php');

        $sql = "INSERT INTO user (fornavn, etternavn, tlf, epost, city, zip, passord) VALUES (:fornavn, :etternavn, :tlf, :epost, :city, :zip, :passord)";  
        
        $q = $pdo->prepare($sql);

        // koble db-navn til parametere, oversett til SQL
        $q->bindParam(':fornavn', $fornavn, PDO::PARAM_STR);
        $q->bindParam(':etternavn', $etternavn, PDO::PARAM_STR);
        $q->bindParam(':tlf', $tlf, PDO::PARAM_STR);
        $q->bindParam(':epost', $epost, PDO::PARAM_STR);
        $q->bindParam(':city', $city, PDO::PARAM_STR);
        $q->bindParam(':zip', $zip, PDO::PARAM_STR);
        $q->bindParam(':passord', $cipherPassord, PDO::PARAM_STR);
    
   // feilmeldinger
    try {
        $q->execute();
        header("Location: login.php"); /* Redirect browser */
    exit();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }
    //$q->debugDumpParams();

  } else {
    echo "Feil med bekrefting av passord!";
  }
    }
      ?>
    </div>
  </div>

</body>
</html>