<?php
include 'bdd.php';

$stmt = $dbh->prepare('INSERT INTO membre VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute(array(
    NULL,
    $_POST['rang'],
    1,
    1,
    1,
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['telephone'],
    $_POST['email'],
    $_POST['pseudo'],
    $_POST['mdp']
));

header('Location:principale.php?statut=ENREGISTRE');
