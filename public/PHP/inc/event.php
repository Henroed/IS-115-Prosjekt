<body>
<?php 
$result = $conn->query($sql); // hent fra db

include '../../PHP/eventKommer.php';

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

 // filkobling avhenger av side
    if ($side == "hjemmeside") {
      echo '<form action="../../PHP/eventLike.php" method="POST">';
    } elseif ($side == "mineEvents") {
      echo '<form action="../../PHP/eventFjern.php" method="POST">';
    } 
  ?>

<div class="container">
    <div class="content">
      <div class="title">
              <h2><?php echo $row["eventNavn"]?></h2>
      </div>
      <div class="row">
        <div class="details"> 
            <h4>Event Type: </h4>
             <?php echo ucfirst($row["eventType"])?><br>
           <h4>Beskrivelse: </h4>
             <?php echo $row["beskrivelse"]?><br>
           <h4>Dato: </h4>
             <?php echo date("d/m/Y", strtotime($row["dato"]))?>
            <h4>Lokasjon: </h4>
             <?php echo $row["lokasjon"]?>
            <h5>Antall som kommer: </h5> 
              <?php
                    $eventID = $row['eventID'];
                    
                    echo $antallKommer = kommer($eventID, $conn);
              ?>
        </div><!-- Slutt details -->
      </div> <!-- Slutt row -->

        <input type="hidden" id="custId" name="eventID" value="<?php echo $row["eventID"] ?>">
      
        <!-- Tekst på knapp -->
        <div class="button">
          <?php if ($side == "hjemmeside") {
          echo '<input type="submit" value="Kommer">';
         } elseif ($side == "mineEvents") {
          echo '<input type="submit" value="Kommer ikke">';
         }     
          ?>
        
      </div> <!-- Slutt button -->
    </div><!--Slutt Content  -->
</div> <!--Slutt Container  -->
</form>

<?php   
}
}
?>
</body>
</html>
