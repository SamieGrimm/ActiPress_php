<?php
include 'bdd.php';

// $stmt = $dbh->prepare('DELETE FROM destiner
//                         WHERE CODE_MESSAGE ='. $_POST['email']);
// $stmt->execute();

// $stmt = $dbh->prepare('DELETE FROM message
//                         WHERE CODE_MESSAGE ='. $_POST['email']);
// $stmt->execute();

$stmt = $dbh->prepare('UPDATE message
                        SET ETAT = 2
                        WHERE CODE_MESSAGE ='. $_GET['email']);
$stmt->execute();

include('actualiser.php');
// header('Location:principale.php');
