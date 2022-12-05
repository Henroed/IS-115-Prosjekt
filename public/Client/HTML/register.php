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
            <input type="text" name="passordBekreft" placeholder="Gjenta ditt passord" required>
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

        function Cipher($ch, $key) {
              if (!ctype_alpha($ch))
              return $ch;
                
              $offset = ord(ctype_upper($ch) ? 'A' : 'a');
              return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
          }
    
        function Krypter($input, $key) {
              $output = "";
                
              $inputArray = str_split($input);
              foreach ($inputArray as $ch)
                $output .= Cipher($ch, $key);          
              return $output;
          }

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
    
    if($pdo->lastInsertId() > 0) {
        echo "Data inserted into database, identified by UID " . $pdo->lastInsertId() . ".";
    } else {
        echo "Data were not inserted into database.";
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