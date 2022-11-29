<?php session_start(); ?>
    <!---<title> Responsive Registration Form | CodingLab </title>--->
<link rel="stylesheet" href="../Design/css/registrer.css">
<?php include 'inc/header.php'; ?>
<?php 
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  
    $profileValue = $_SESSION['loginVerdi'];

    $sql = "SELECT fornavn, etternavn, epost, tlf, city, zip, kjønn FROM user WHERE tlf = '$profileValue' OR epost = '$profileValue'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
?>
  <div class="container">
    <div class="title">Min profil</div>
    <div class="content">
      <form action="changeProfile.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details"><?php echo $row["fornavn"] . " " . $row["etternavn"]?></span>
          </div>
          <div class="input-box">
            <span class="details"><?php echo $row["epost"] ?></span>
          </div>
          <div class="input-box">
            <span class="details"><?php echo $row["tlf"] ?></span>
          </div>
          <div class="input-box">
            <span class="details"><?php echo $row["city"] ?></span>
          </div>
          <div class="input-box">
            <span class="details"><?php echo $row["zip"] ?></span>
          </div>
          <div class="input-box">
            <span class="details"><?php echo $row["kjønn"] ?></span>
          </div>
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