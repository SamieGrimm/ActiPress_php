<?php
session_start();
include 'bdd.php';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>