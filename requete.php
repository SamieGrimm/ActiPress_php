<?php
session_start();
include 'bdd.php';

$stmt = $dbh->prepare("SELECT * FROM membre WHERE pseudo = ? AND mot_de_passe = ?");
$stmt->execute(array($_POST['username'], $_POST['password']));

foreach ($stmt as $row) {
    echo '<pre>';
    print_r($row);
    echo '</pre>';
}
