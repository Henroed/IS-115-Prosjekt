<?php session_start(); 
    require_once('../../../private/Database/inc/db_connect.php'); 
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase"); 
     
    $profileValue = $_SESSION['loginVerdi'];

    $sq1 = "SELECT fornavn, etternavn, epost, tlf, city, zip FROM user WHERE tlf = '$profileValue' OR epost = '$profileValue'";
    $result = $conn->query($sq1);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

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
    <div class="title">Endre profil</div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">fornavn</span>
            <input type="text" name="fornavn" value="<?php echo $row["fornavn"] ?>">
          </div>
          <div class="input-box">
            <span class="details">etternavn</span>
            <input type="text" name="etternavn" value="<?php $row["etternavn"] ?>">
          </div>
          <div class="input-box">
            <span class="details">epost</span>
            <input type="text" name="epost" value="<?php echo $row["epost"] ?>" >
          </div>
          <div class="input-box">
            <span class="details">tlf nummer</span>
            <input type="text" name="tlf" value="<?php echo $row["tlf"] ?>" >
          </div>
          <div class="input-box">
            <span class="details">By</span>
            <input type="text" name="city" value="<?php echo $row["city"] ?>" >
          </div>
          <div class="input-box">
            <span class="details">zip-kode</span>
            <input type="text" name="zip" value="<?php echo $row["zip"] ?>" >
          </div>
          <div class="input-box">
            <span class="details">passord</span>
            <input type="password" name="passord"  placeholder="Skriv nytt inn passord">
          </div>
          <div class="input-box">
            <span class="details">Bekreft passord</span>
            <input type="password" placeholder="Gjenta ditt passord" >
          </div>
        </div>
      
       
        <div class="button">
          <input type="submit" value="Lagre endret innformasjon"></input>
        </div>
      </form>

      <?php
      }}
if(isset($_POST['Lagre endret innformasjon'])){

    $sql = "UPDATE user set fornavn='$fornavn', etternavn='$etternavn', tlf='$tlf', epost='$epost' WHERE userID='$student_id'";

    $q = $pdo->prepare($sql);
    
    $q->bindParam(':fornavn', $fornavn, PDO::PARAM_STR);
    $q->bindParam(':etternavn', $etternavn, PDO::PARAM_STR);
    $q->bindParam(':tlf', $tlf, PDO::PARAM_INT);
    $q->bindParam(':epost', $epost, PDO::PARAM_STR);
    $q->bindParam(':city', $city, PDO::PARAM_STR);
    $q->bindParam(':zip', $zip, PDO::PARAM_INT);
    $q->bindParam(':passord', $passord, PDO::PARAM_STR);

    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $epost = $_POST["epost"];
    $tlf = $_POST["tlf"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
    $passord = $_POST["passord"];
    

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
    }

$q->debugDumpParams();
      
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