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
    <?php include "../inc" ?>

  <div class="container">
    <div class="title">Glømt passord</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Epost eller Tlf-nummer</span>
            <input type="text" placeholder="Skriv inn din epost eller tlf" required>
        </div>
        <div class="button">
          <input type="submit" value="Reset">
          <div class="login">Gå tilbake til <a href="login.html">Logg inn</a></div>
        </div>
      </form>
    </div>
  </div>

  <?php include "./footer.html" ?>

</body>
</html>
