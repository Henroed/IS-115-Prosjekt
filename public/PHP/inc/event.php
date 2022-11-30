<?php 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
  // For hver ID gjør dette
  for(["event_id"] = x){
  ?>
<form action="eventLike.php" method="POST">
  <div class="container">
    <div class="content">
      <div class="title"><span>
        <h2><?php echo $row["eventNavn"]?></h2></div>
      <div class="row">
       <div class="details"> <h4>Beskrivelse: </h4>
        <?php echo $row["beskrivelse"]?><br>
      </div>
       <div class="row">
       <div class="details"> <h4>Dato: </h4>
          <?php echo $row["dato"]?>
       </div>
          <div class="row">
            <i class="fas fa-bilde"></i>
            <img src="../../Client/Design\img\Capture.PNG" width="200" height="200">
              <?php
                //your PHP code goes here
              ?>
        </div>
      <div class="row button">
        <input type="submit" value="<?php echo $row["eventID"] ?>" name="eventID">
      </div>
    </div>
  </div>
</form>

<br><br>
<?php   
  }
}
}
?>
</body>
</html>