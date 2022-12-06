<?php
/* Sier hvor mange som kommer på de ulike eventene */

function kommer($eventID, $conn) {

    $sqlKommer = "SELECT COUNT(eventID) as resultat FROM myevent WHERE eventID = '$eventID'";

    $resultKommer = mysqli_query($conn, $sqlKommer);
    $value = mysqli_fetch_assoc($resultKommer);
    echo implode($value); // impode gjør om array til string

}

?>