<?php
session_start();
include 'bdd.php';

$stmt = $dbh->prepare('SELECT * FROM destiner d 
                    JOIN message m ON d.CODE_MESSAGE = m.CODE_MESSAGE
                    WHERE d.CODE_MEMBRE = ' . $_SESSION['CODE_MEMBRE']);
$stmt->execute();
$result = $stmt->fetchAll();
// $message = array();
$_SESSION['message'] = array();
for ($i = 0; $i <= count($result) - 1; $i++){
    // echo $result[$i]['EMETTEUR'] . ' ' . $result[$i]['SUJET'] . '<br>';
    // $_SESSION['message'].array_push($result[$i]['EMETTEUR']);
    // $_SESSION['message'].array_push('message');
    array_push($_SESSION['message'], $result[$i]['EMETTEUR'] . ' ' . $result[$i]['SUJET']);
}
// $_SESSION['message'] = $message;
header('Location:principale.php');
?>