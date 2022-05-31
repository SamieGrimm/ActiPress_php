<?php
include 'bdd.php';

$stmt = $dbh->prepare('SELECT * FROM destiner d 
                    JOIN message m ON d.CODE_MESSAGE = m.CODE_MESSAGE
                    WHERE m.ETAT = 1
                    AND d.email_destinataire = \'' . $_SESSION['EMAIL'] . '\'');
$stmt->execute();
$result = $stmt->fetchAll();
