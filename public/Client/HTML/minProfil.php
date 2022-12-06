<?php session_start(); ?>
<link rel="stylesheet" href="../Design/css/registrer.css">
<?php include 'inc/header.php'; ?>
<?php 
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  
    $profileValue = $_SESSION['loginVerdi'];

    // hent verdier fra db
    $sql = "SELECT fornavn, etternavn, epost, tlf, city, zip FROM user WHERE tlf = '$profileValue' OR epost = '$profileValue'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        // definer verdier fra db
        $fornavn = $row["fornavn"];
        $etternavn = $row["etternavn"];
        $epost = $row["epost"];
        $tlf = $row["tlf"];
        $city = $row["city"];
        $zip = $row["zip"];
?>
  <div class="container">
    <div class="title">Min profil</div>
    <div class="content">
      <form action="oppdaterProfil.php" method="POST"> <!-- Send bruker til oppdaterProfil.php, send skjema til nettleser -->
        <div class="user-details">
          <div class="input-box">
            <span class="details">
              <h5>Navn:</h5>
              <?php echo $fornavn . " " . $etternavn?></span>
            <input type="hidden" id="custId" name="fornavn" value="<?php echo $fornavn?>">
            <input type="hidden" id="custId" name="etternavn" value="<?php echo $etternavn?>">
          </div>
          <div class="input-box">
          <h5>Epost:</h5>
            <span class="details"><?php echo $epost?></span>
            <input type="hidden" id="custId" name="epost" value="<?php echo $epost?>">
          </div>
          <div class="input-box">
          <h5>Telefonnummer:</h5>
            <span class="details"><?php echo $tlf?></span>
            <input type="hidden" id="custId" name="tlf" value="<?php echo $tlf?>">
          </div>
          <div class="input-box">
          <h5>By:</h5>
            <span class="details"><?php echo $city?></span>
            <input type="hidden" id="custId" name="city" value="<?php echo $city?>">
          </div>
          <div class="input-box">
          <h5>ZIP-kode:</h5>
            <span class="details"><?php echo $zip?></span>
            <input type="hidden" id="custId" name="zip" value="<?php echo $zip?>">
          </div>
          <div class="input-box">
        <div class="button">
          <input type="submit" value="Endre informasjon">
        </div>
      </form>
    </div>
</div>
<?php   
    }
  }
  $conn->close();
?>
<?php include "inc/footer.html";
      if(!isset($_SESSION['loginVerdi'])) // If session is not set then redirect to Login Page
      {
          header("Location:login.php");  
      }
?>
</body>
</html>