<?php session_start(); ?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

  require_once('../../../private/Database/inc/db_connect.php');

  $sql = "INSERT INTO myEvent
  (eventID, userID) 
  VALUES 
  (:eventID, :userID)";  
  
  $q = $pdo->prepare($sql);

  $q->bindParam(':eventID', $eventID, PDO::PARAM_STR);
  $q->bindParam(':userID', $selectValue, PDO::PARAM_STR);

  $eventID = $_POST["eventID"];

    $profileValue = $_SESSION['loginVerdi'];
    $userQuery = "SELECT userID FROM user WHERE tlf = '$profileValue' OR epost = '$profileValue'";

    $userValue = $conn->query($userQuery);

    $userID = $userValue->fetch_assoc();
    $selectValue = $userID["userID"];

try {
  $q->execute();
  header("Location: myEvents.php"); /* Redirect browser */
exit();
} catch (PDOException $e) {
  echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
}
//$q->debugDumpParams();

if($pdo->lastInsertId() > 0) {
  echo "Data inserted into database, identified by UID " . $pdo->lastInsertId() . ".";
} else {
  echo "Data were not inserted into database.";
}

?>