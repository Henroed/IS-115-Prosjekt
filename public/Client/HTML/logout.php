<?php
session_start();
unset($_SESSION['loginVerdi']);
session_destroy();
header('Location: login.php');
exit;
?>