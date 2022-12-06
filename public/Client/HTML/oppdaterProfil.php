<?php session_start(); 

// definer verdier fra db
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
  <?php include 'inc/header.html'; ?>
  <div class="container">
    <div class="title">Registrer</div>
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
            <input type="text" name="passordBekreft" placeholder="Gjenta passord" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit "value="Lagre endret innformasjon">
        </div>
      </form>

      <?php
// koble til profil
$profileValue = $_SESSION['loginVerdi'];

 //Kriterie for db kobling
if(isset($_POST["passordBekreft"]) && isset($_POST["passord"])){
 
  // definer verdier fra db 
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $epost = $_POST["epost"];
    $tlf = $_POST["tlf"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
    $passord = $_POST["passord"];
    $passordBekreft = $_POST["passordBekreft"];

     //Kriterie for db kobling
    if ($passord == $passordBekreft) {
    require_once('../../../private/Database/inc/db_connect.php'); 

    // oppdater db
    $sql = "UPDATE user SET Fornavn = :fornavn, Etternavn = :etternavn, Tlf = :tlf, Epost = :epost , city= :city, Zip = :zip, Passord = :passord WHERE Tlf = '$profilVerdi' OR Epost = '$profilVerdi'";

    $q = $pdo->prepare($sql);

    // koble db-navn til parametere, oversett til SQL
    $q->bindParam(':fornavn', $fornavn, PDO::PARAM_STR);
    $q->bindParam(':etternavn', $etternavn, PDO::PARAM_STR);
    $q->bindParam(':tlf', $tlf, PDO::PARAM_STR);
    $q->bindParam(':epost', $epost, PDO::PARAM_STR);
    $q->bindParam(':city', $city, PDO::PARAM_STR);
    $q->bindParam(':zip', $zip, PDO::PARAM_STR);
    $q->bindParam(':passord', $passord, PDO::PARAM_STR);

    // feilmeldinger
    try {
        $q->execute();
        header("Location: minProfil.php");
    exit();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>";
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