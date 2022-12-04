<?php session_start(); ?>
<?php
require_once('../../../private/Database/inc/db_connect.php');
$conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

$eventID = 2;
$sql = "SELECT COUNT(*) FROM myevent where eventID=$eventID";

$result = $conn->query($sql);
print_r($result);
 
if($pdo->lastInsertId() > 0) {
  echo "Data satt i databasen, identifisert med UID " . $pdo->lastInsertId() . ".";
} else {
  echo "Data ikke satt i databasen.";
}

?>
