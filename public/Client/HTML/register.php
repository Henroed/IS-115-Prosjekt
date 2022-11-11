<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../Design/css/registrer.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registrer</div>
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
          <input type="submit" value="Register">
          <div class="login">Allerede medlem? <a href="login.php">Logg inn her</a></div>
        </div>
      </form>

      <?php 

        if (isset($_POST["fornavn"]) && isset($_POST["epost"]) && isset($_POST["passord"])) {
        require_once('../../../private/Database/inc/db_connect.php');

        $sql = "INSERT INTO user
        (fornavn, etternavn, tlf, epost, city, zip, passord) 
        VALUES 
        (:fornavn, :etternavn, :tlf, :epost, :city, :zip, :passord)";  
        
        $q = $pdo->prepare($sql);
    
        $q->bindParam(':fornavn', $fornavn, PDO::PARAM_STR);
        $q->bindParam(':etternavn', $etternavn, PDO::PARAM_STR);
        $q->bindParam(':tlf', $tlf, PDO::PARAM_STR);
        $q->bindParam(':epost', $epost, PDO::PARAM_STR);
        $q->bindParam(':city', $city, PDO::PARAM_INT);
        $q->bindParam(':zip', $zip, PDO::PARAM_STR);
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
        header("Location: login.html"); /* Redirect browser */
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