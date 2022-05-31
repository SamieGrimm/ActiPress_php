<?php
session_start();
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
include 'bdd.php';
$dateTime = date("Y-m-d H:i:s", time());

$stmt = $dbh->prepare('INSERT INTO message VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute(array(NULL,
                    $_SESSION['CODE_MEMBRE'], 
                    $_SESSION['NOM'],
                    $dateTime,
                    NULL,
                    $_POST['sujet'], 
                    $_POST['message'], 
                    NULL,
                    1));

$stmt = $dbh->prepare("SELECT * FROM message ORDER BY message.CODE_MESSAGE DESC LIMIT 1");
$stmt->execute();
$result = $stmt->fetch();
// echo '<pre>';
// var_dump($result['CODE_MESSAGE']);
// echo '</pre>';

$stmt = $dbh->prepare('INSERT INTO destiner VALUES (?, ?, ?, ?)');
$stmt->execute(array(intval($result['CODE_MESSAGE']), 
                    $_SESSION['CODE_MEMBRE'], 
                    NULL, 
                    $_POST['email']));

header('Location:principale.php?statut=ENVOYE');
