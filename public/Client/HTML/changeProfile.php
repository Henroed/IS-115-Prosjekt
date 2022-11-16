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
          <input type="submit" value="Lagre endret innformasjon">
        </div>
      </form>

      <?php

$userID = $_POST["userID"];
$fornavn = $_POST["fornavn"];
$etternavn = $_POST["etternavn"];
$epost = $_POST["epost"];
$kjønn = $_POST["kjønn"];

$servername = "localhost";
$username = "bob";
$password = "123456";
$db = "classDB";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "update students set name='$name', age='$age', gender='$gender' where student_id='$student_id'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$student_id."-".$name."-".$age."-".$gender;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>
    </div>
  </div>

</body>
</html>