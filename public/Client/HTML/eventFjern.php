<?php session_start(); ?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

    $eventID = $_POST["eventID"];

    $profilVerdi = $_SESSION['loginVerdi'];
    $brukerQuery = "SELECT userID FROM user WHERE tlf = '$profilVerdi' OR epost = '$profilVerdi'";

    $brukerVerdi = $conn->query($brukerQuery);

    $brukerID = $brukerVerdi->fetch_assoc();
    $valgtVerdi = $brukerID["userID"];

    $sql = "DELETE FROM myevent WHERE eventID = $eventID AND userID = $valgtVerdi";  

    if ($conn->query($sql) === TRUE) {
        header("Location: mineEvents.php");
     } else {
         echo "Error deleting record: " . $conn->error;
     }

if($pdo->lastInsertId() > 0) {
  echo "Data satt i databasen, identifisert med UID " . $pdo->lastInsertId() . ".";
} else {
  echo "Data ikke satt i databasen.";
}

?>