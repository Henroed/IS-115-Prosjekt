<?php 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
<form action="eventLike.php" method="POST">
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
?>
</body>
</html>