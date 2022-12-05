<?php session_start(); ?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

  require_once('../../../private/Database/inc/db_connect.php');

  // hent fra db
  $sql = "INSERT INTO myEvent (eventID, userID) VALUES (:eventID, :userID)";  
  $q = $pdo->prepare($sql);

  // koble db-navn til parametere, oversett til SQL
  $q->bindParam(':eventID', $eventID, PDO::PARAM_STR);
  $q->bindParam(':userID', $valgtVerdi, PDO::PARAM_STR);

     // definer verdier fra db
    $eventID = $_POST["eventID"];
    
    // koble til profil
    $profilVerdi = $_SESSION['loginVerdi'];
    $brukerQuery = "SELECT userID FROM user WHERE tlf = '$profilVerdi' OR epost = '$profilVerdi'";

    $brukerVerdi = $conn->query($brukerQuery);

    $brukerID = $brukerVerdi->fetch_assoc();
    $valgtVerdi = $brukerID["userID"];

try {
  $q->execute();
  header("Location: mineEvents.php");
exit();
} catch (PDOException $e) {
  echo "Error querying database: " . $e->getMessage() . "<br>";
}


if($pdo->lastInsertId() > 0) {
  echo "Data satt i databasen, identifisert med UID " . $pdo->lastInsertId() . ".";
} else {
  echo "Data ikke satt i databasen.";
}

?>