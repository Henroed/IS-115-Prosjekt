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
    <div class="title">Endre profil</div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fornavn</span>
            <input type="text" name="fornavn" value="Chris" required>
          </div>
          <div class="input-box">
            <span class="details">Etternavn</span>
            <input type="text" name="etternavn" value="Martin">
          </div>
          <div class="input-box">
            <span class="details">Epost</span>
            <input type="text" name="epost" value="Chris@mail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Tlf nummer</span>
            <input type="text" name="tlf" value="12345678" required>
          </div>
          <div class="input-box">
            <span class="details">By</span>
            <input type="text" name="city" value="Kristiansand" required>
          </div>
          <div class="input-box">
            <span class="details">Zip-kode</span>
            <input type="text" name="zip" value="4623" required>
          </div>
          <div class="input-box">
            <span class="details">Passord</span>
            <input type="text" name="passord" value="dsaoass" placeholder="Skriv inn passord" required>
          </div>
          <div class="input-box">
            <span class="details">Bekreft passord</span>
            <input type="text" placeholder="Gjenta ditt passord" >
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit "value="Lagre endret innformasjon">
        </div>
      </form>

      <?php



$profileValue = $_SESSION['loginVerdi'];

if(isset($_POST["fornavn"]) && isset($_POST["epost"]) && isset($_POST["passord"])){

  require_once('../../../private/Database/inc/db_connect.php'); 

    echo $fornavn = $_POST["fornavn"];
    echo $etternavn = $_POST["etternavn"];
    echo $epost = $_POST["epost"];
    echo $tlf = $_POST["tlf"];
    echo $city = $_POST["city"];
    echo $zip = $_POST["zip"];
    $passord = $_POST["passord"];
  
    $sql = "UPDATE user set Fornavn = :fornavn, Etternavn = :etternavn, Tlf = :tlf, Epost = :epost , city= :city, Zip = :zip, Passord = :passord WHERE Tlf = '$profileValue' OR Epost = '$profileValue'";

    $q = $pdo->prepare($sql);
    
    $q->bindParam(':fornavn', $fornavn, PDO::PARAM_STR);
    $q->bindParam(':etternavn', $etternavn, PDO::PARAM_STR);
    $q->bindParam(':tlf', $tlf, PDO::PARAM_STR);
    $q->bindParam(':epost', $epost, PDO::PARAM_STR);
    $q->bindParam(':city', $city, PDO::PARAM_INT);
    $q->bindParam(':zip', $zip, PDO::PARAM_STR);
    $q->bindParam(':passord', $passord, PDO::PARAM_STR);

    try {
        $q->execute();
        header("Location: profile.php"); /* Redirect browser */
    exit();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }

    //$q->debugDumpParams();
    
    if($pdo->lastInsertId() > 0) {
        echo "Data inserted into database, identified by UID " . $pdo->lastInsertId() . ".";

    } else {
        echo "Data were not inserted into database.";
    }

    }

?>
    </div>
  </div>

</body>
</html>