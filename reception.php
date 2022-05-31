<?php
session_start();
include 'bdd.php';
include 'fonction.php';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$stmt = $dbh->prepare('SELECT * FROM destiner d 
                    JOIN message m ON d.CODE_MESSAGE = m.CODE_MESSAGE
                    WHERE d.CODE_MEMBRE = ' . $_SESSION['CODE_MEMBRE'] . '
                    AND m.ETAT = 1');
$stmt->execute();
$result = $stmt->fetchAll();

echo 'Emetteur : ' . $_SESSION['message'][$_GET['email']][0] . '<br>';
echo 'Sujet : ' . $_SESSION['message'][$_GET['email']][1] . '<br>';
echo 'Text : ' . $_SESSION['message'][$_GET['email']][2] . '<br>';


retour();

// echo 'Emetteur : ' . $_SESSION['message'][$_GET['email']][] . '<br>';
// echo 'test';

?>