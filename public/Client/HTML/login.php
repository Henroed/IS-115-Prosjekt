<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Login Form | CodingLab</title> -->
    <link rel="stylesheet" href="../Design/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Logg inn</span></div>
        <form action="#" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="loginVerdi" placeholder="Epost eller tlf-nummer" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="passord" placeholder="Passord" required>
          </div>
          <div class="pass"><a href="forgotPassword.html">Glømt passord?</a></div>
          <div class="row button">
            <input type="submit" value="Logg inn">
          </div>
          <div class="signup-link">Ikke et medlem? <a href="register.php">Registrer deg</a></div>
        </form>
        <?php 

          if(isset($_SESSION['loginVerdi'])) {
              header("Location:homepage.php"); 
                }

          if (isset($_POST["loginVerdi"]) && isset($_POST["passord"])) {

            $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

            $loginVerdi = $_POST['loginVerdi'];
            $passord = $_POST['passord'];
        
            $sql = "SELECT * FROM user WHERE epost='$loginVerdi' AND passord='$passord' OR tlf='$loginVerdi' AND passord='$passord'";
            $result = mysqli_query($conn, $sql);
        
            if ($row = mysqli_fetch_assoc($result)) {
             $_SESSION['loginVerdi'] = $loginVerdi;
             header("Location: homepage.php"); /* Redirect browser */
        
            } else {
              echo "Your username or password is incorrect!";
            }
            $conn->close();
          }
        ?>
      </div>
    </div>

  </body>
</html>