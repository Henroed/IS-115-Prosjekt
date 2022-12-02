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
    <div class="wrapper">
      <div class="title"><span>
        <?php
          echo $row["eventNavn"]
        ?></span></div>
      <div class="row">
       <i class="fas fa-info"></i>
         Info om Snikk Snakk.<br>
        <?php
          echo $row["beskrivelse"]
        ?><br>
      </div>
       <div class="row">
         <i class="fas fa-dato"></i>
          <?php
            echo $row["dato"]
          ?>
       </div>
          <div class="row">
            <i class="fas fa-bilde"></i>
            <img src="../../Client/Design\img\Capture.PNG" width="200" height="200">
              <?php
                //your PHP code goes here
              ?>
        </div>
        <input type="hidden" id="custId" name="eventID" value="<?php echo $row["eventID"] ?>">
      <div class="row button">
        <?php if ($side == "hjemmeside") {
            echo '<input type="submit" value="Kommer">';
        } elseif ($side == "mineEvents") {
            echo '<input type="submit" value="Kommer ikke">';
        }
        ?>
      </div>
    </div>
  </div>
</form>

<br><br>
<?php   
}
}

?>
</body>
</html>