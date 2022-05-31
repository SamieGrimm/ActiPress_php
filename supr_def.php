<?php
include 'bdd.php';

$stmt = $dbh->prepare("DELETE FROM destiner WHERE CODE_MESSAGE = ?");
$stmt->execute(array($_GET['email']));

$stmt = $dbh->prepare("DELETE FROM message WHERE CODE_MESSAGE = ?");
$stmt->execute(array($_GET['email']));

header('Location: allEmail.php');