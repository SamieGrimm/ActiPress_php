<?php
session_start();
include 'bdd.php';

$stmt = $dbh->prepare('SELECT * FROM destiner d 
                    JOIN message m ON d.CODE_MESSAGE = m.CODE_MESSAGE
                    WHERE m.ETAT = 1
                    AND d.email_destinataire = \'' . $_SESSION['EMAIL'] . '\'');
$stmt->execute();
$result = $stmt->fetchAll();

$_SESSION['message'] = array();

for ($i = 0; $i <= count($result) - 1; $i++){
    $info = array();
    array_push($info, $result[$i]['EMETTEUR'], $result[$i]['SUJET'], $result[$i]['TEXT'], $result[$i]['CODE_MESSAGE'], $result[$i]['DATE_HEURE_D_ENVOIE']);
    array_push($_SESSION['message'], $info);
}

header('Location:principale.php');
?>