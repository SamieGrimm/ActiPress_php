<?php
session_start();
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
include 'bdd.php';

$stmt = $dbh->prepare('INSERT INTO message VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
// $stmt->bindParam(1, 0);
// $stmt->bindParam(2, $_SESSION['CODE_MEMBRE']);
// $stmt->bindParam(3, $_SESSION['NOM']);
// $stmt->bindParam(4, Null);
// $stmt->bindParam(5, Null);
// $stmt->bindParam(6, $_POST['sujet']);
// $stmt->bindParam(7, $_POST['message']);
// $stmt->bindParam(8, Null);
// $stmt->bindParam(9, 1);
// $stmt->execute();
$stmt->execute(array(NULL,
                    $_SESSION['CODE_MEMBRE'], 
                    $_SESSION['NOM'],
                    NULL,
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
// $stmt->bindParam(':codeMessage', Null);
// $stmt->bindParam(':codeMembre', $_SESSION['CODE_MEMBRE']);
// $stmt->bindParam(':dateHeureRecu', Null);
// $stmt->bindParam(':destinataire', $_POST['email']);
// $stmt->execute();
$stmt->execute(array(intval($result['CODE_MESSAGE']), 
                    $_SESSION['CODE_MEMBRE'], 
                    NULL, 
                    $_POST['email']));

header('Location:principale.php?statut=ENVOYE');
