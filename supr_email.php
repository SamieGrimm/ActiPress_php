<?php
include 'bdd.php';

$dateTime = date("Y-m-d H:i:s", time());

$stmt = $dbh->prepare("UPDATE message SET ETAT = 2, DATE_HEURE_DE_SUPPRESSION = ? WHERE CODE_MESSAGE = ?");
$stmt->execute(array($dateTime, $_GET['email']));
include('actualiser.php');
