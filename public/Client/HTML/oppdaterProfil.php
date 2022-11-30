<?php session_start(); 

  $fornavn = $_POST["fornavn"];
  $etternavn = $_POST["etternavn"];
  $epost = $_POST["epost"];
  $tlf = $_POST["tlf"];
  $city = $_POST["city"];
  $zip = $_POST["zip"];

?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Design/css/registrer.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php include 'inc/header.php'; ?>
  <div class="container">
    <div class="title">Oppdater profil</div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fornavn</span>
            <input type="text" name="fornavn" value="<?php echo $fornavn?>" required>
          </div>
          <div class="input-box">
            <span class="details">Etternavn</span>
            <input type="text" name="etternavn" value="<?php echo $etternavn?>" required>
          </div>
          <div class="input-box">
            <span class="details">Epost</span>
            <input type="text" name="epost" value="<?php echo $epost?>" required>
          </div>
          <div class="input-box">
            <span class="details">Tlf nummer</span>
            <input type="text" name="tlf" value="<?php echo $tlf?>" required>
          </div>
          <div class="input-box">
            <span class="details">By</span>
            <input type="text" name="city" value="<?php echo $city?>" required>
          </div>
          <div class="input-box">
            <span class="details">Zip-kode</span>
            <input type="text" name="zip" value="<?php echo $zip?>" required>
          </div>
          <div class="input-box">
            <span class="details">Passord</span>
            <input type="text" name="passord" placeholder="Skriv inn passord" required>
          </div>
          <div class="input-box">
            <span class="details">Bekreft passord</span>
            <input type="text" name="passordBekreft" placeholder="Gjenta ditt passord" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit "value="Lagre endret innformasjon">
        </div>
      </form>

      <?php

$profilVerdi = $_SESSION['loginVerdi'];

if(isset($_POST["passordBekreft"]) && isset($_POST["passord"])){

    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $epost = $_POST["epost"];
    $tlf = $_POST["tlf"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
    $passord = $_POST["passord"];
    $passordBekreft = $_POST["passordBekreft"];

    if ($passord == $passordBekreft) {

    require_once('../../../private/Database/inc/db_connect.php'); 
  
    $sql = "UPDATE user SET Fornavn = :fornavn, Etternavn = :etternavn, Tlf = :tlf, Epost = :epost , city= :city, Zip = :zip, Passord = :passord WHERE Tlf = '$profilVerdi' OR Epost = '$profilVerdi'";

    $q = $pdo->prepare($sql);
    
    $q->bindParam(':fornavn', $fornavn, PDO::PARAM_STR);
    $q->bindParam(':etternavn', $etternavn, PDO::PARAM_STR);
    $q->bindParam(':tlf', $tlf, PDO::PARAM_STR);
    $q->bindParam(':epost', $epost, PDO::PARAM_STR);
    $q->bindParam(':city', $city, PDO::PARAM_STR);
    $q->bindParam(':zip', $zip, PDO::PARAM_STR);
    $q->bindParam(':passord', $passord, PDO::PARAM_STR);

    try {
        $q->execute();
        header("Location: minProfil.php");
    exit();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>";
    }
    
    if($pdo->lastInsertId() > 0) {
        echo "Data satt i databasen, identifisert med UID " . $pdo->lastInsertId() . ".";
    } else {
        echo "Data ikke satt i databasen.";
    }

    } else {
      echo "Feil med bekrefting av passord!";
    }
  }
?>
    </div>
  </div>

</body>
</html>