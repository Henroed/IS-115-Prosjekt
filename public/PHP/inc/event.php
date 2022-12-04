<?php 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    if ($side == "hjemmeside") {
      echo '<form action="eventLike.php" method="POST">';
    } elseif ($side == "mineEvents") {
      echo '<form action="eventFjern.php" method="POST">';
    }
  ?>
<div class="container">
    <div class="content">
      <div class="title">
              <h2><?php echo $row["eventNavn"]?></h2>
      </div>
      <div class="row">
        <div class="details"> 
           <h4>Beskrivelse: </h4>
             <?php echo $row["beskrivelse"]?><br>
           <h4>Dato: </h4>
             <?php echo date("d/m/Y", strtotime($row["dato"]))?>
                <h5>Antall som kommer: </h5> 
                <?php include 'eventKommer.php' ?>
        </div><!-- Slutt details -->
     
          <i class="fas fa-bilde"></i>
        <img src="../../Client/Design\img\Capture.PNG" width="200" height="200">
       
        <?php
          //your PHP code goes here
        ?>

      </div> <!-- Slutt row -->

        <input type="hidden" id="custId" name="eventID" value="<?php echo $row["eventID"] ?>">
      
        <div class="row button">
          <?php if ($side == "hjemmeside") {
          echo '<input type="submit" value="Kommer">';
         } elseif ($side == "mineEvents") {
          echo '<input type="submit" value="Kommer ikke">';
         }     
          ?>
        
      </div> <!-- Slutt row button -->
    </div><!--Slutt Content  -->
</div> <!--Slutt Container  -->
</form>

<?php   
}
}

?>
</body>
</html>