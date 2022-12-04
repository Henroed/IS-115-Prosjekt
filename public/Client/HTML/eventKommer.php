<?php session_start(); ?>
<?php
require_once('../../../private/Database/inc/db_connect.php');
$conn = mysqli_connect("localhost", "root", "", "eventdatabase");  

$eventID=4; //byttes ut med $_POST["eventID"]
$sql = "SELECT COUNT(eventID) as resultat FROM myevent WHERE eventID = '$eventID'";

$result = mysqli_query($conn, $sql);
$value = mysqli_fetch_assoc($result);
echo implode($value);


?>
