<link rel="stylesheet" href="../Design/css/main.css">
<?php include 'inc/header.html' ?>
  <?php
      $i = 0;
      while($i < 5) {
        include '../../PHP/inc/event.php';
      $i = $i + 1;
      }
    ?>
<?php include 'inc/footer.html' ?>
</div>