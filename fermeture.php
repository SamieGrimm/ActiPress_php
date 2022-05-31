<?php
// fermeture
$sth = null;
$dbh = null;
session_destroy();

header('Location:index.php');
?>