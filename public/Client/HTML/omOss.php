<?php session_start(); ?>
<!DOCTYPE html>
<html lang="no" dir="ltr">  
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Design/css/registrer.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'inc/header.php'; ?>

  <?php
        if(!isset($_SESSION['loginVerdi']))
        {
            header("Location:login.php");  
        }
  ?>
  <div class="container">
    <div class="title">Om oss</div>
    <div class="content">
      Vi et to studenter på UiA i gang med å lære PHP-webutvikling. 
      Denne nettsiden er ment som et prosjekt for å vise programmeringsevnen vår i språket etter fullført semester.
    </div><br>
    <div class="title">Hvordan bruke nettsiden</div>
    <div class="content">
      På hjemmesiden har du oversikt over alle kommende events. Om du trykker på "kommer" blir eventen lagret i Mine Events, 
      der du også kan fjerne dem om du ombestemmer deg. 
      <br>
      Events kan opprettes på Lag Events, og du kan få en oversikt over eller endre profilen din på Min Profil.
    </div><br>
    <div class="title">Kontakt Oss</div>
    <div class="content">
      Telefon: 12345678
        <br><br>
      Epost: abc@gmail.com
    </div>
</div>
</body>
</html>