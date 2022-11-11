
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../Design/css/registrer.css">
<?php include 'inc/header.html' ?>
  <div class="container">
    <div class="title">Min profil</div>
    <div class="content">
      <form action="register" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Fornavn</span>
            <input type="text" name="fornavn" placeholder="Chris" required>
          </div>
          <div class="input-box">
            <span class="details">Etternavn</span>
            <input type="text" name="etternavn" placeholder="Martin">
          </div>
          <div class="input-box">
            <span class="details">Epost</span>
            <input type="text" name="epost" placeholder="@mail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Tlf nummer</span>
            <input type="text" name="tlf" placeholder="+47 123 45 678" required>
          </div>
          <div class="input-box">
            <span class="details">By</span>
            <input type="text" name="city" placeholder="Kristiansand" required>
          </div>
          <div class="input-box">
            <span class="details">Zip-kode</span>
            <input type="text" name="zip" placeholder="46xx" required>
          </div>
          <div class="input-box">
            <span class="details">Passord</span>
            <input type="text" name="passord" placeholder="Skriv inn passord" required>
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
          <input type="submit" value="Lagre endret informasjon">
        </div>
      </form>
    </div>
</div>
<?php include "inc/footer.html" ?>
</body>
</html>