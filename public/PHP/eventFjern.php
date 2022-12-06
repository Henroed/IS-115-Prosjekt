<?php session_start(); ?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

    // definer verdier fra db
    $eventID = $_POST["eventID"];

    // koble til profil
    $profilVerdi = $_SESSION['loginVerdi'];
    $brukerQuery = "SELECT userID FROM user WHERE tlf = '$profilVerdi' OR epost = '$profilVerdi'";

    $brukerVerdi = $conn->query($brukerQuery);

    $brukerID = $brukerVerdi->fetch_assoc();
    $valgtVerdi = $brukerID["userID"];

    // slette event fra profil
    $sql = "DELETE FROM myevent WHERE eventID = $eventID AND userID = $valgtVerdi";  

  // feilmeldinger
    if ($conn->query($sql) === TRUE) {
        header("Location: ../Client/HTML/mineEvents.php");
     } else {
         echo "Error deleting record: " . $conn->error;
     }

if($pdo->lastInsertId() > 0) {
  echo "Data satt i databasen, identifisert med UID " . $pdo->lastInsertId() . ".";
} else {
  echo "Data ikke satt i databasen.";
}

?>