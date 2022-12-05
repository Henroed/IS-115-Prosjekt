<?php
session_start();
unset($_SESSION['loginVerdi']); // koble fra profil
session_destroy(); // øddelegge session
header('Location: login.php');  // send til login.php
exit;
?>