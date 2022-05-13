<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    include 'bdd.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username !== "" && $password !== "") {
        $stmt = $dbh->prepare("SELECT * FROM membre WHERE pseudo = ? AND mot_de_passe = ?");
        $stmt->execute(array($_POST['username'], $_POST['password']));
        $result = $stmt->fetchAll();

        if ($stmt->rowCount() == 1) // nom d'utilisateur et mot de passe correctes
        {
            foreach ($result as $row) {
                echo '<pre>';
                $_SESSION = ($row);
                echo '</pre>';
            }
            header('Location: principale.php');
        } else {
            header('Location: login.php?erreur=1&info=' . $count); // utilisateur ou mot de passe incorrect
        }
    } else {
        header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
} else {
    header('Location: login.php');
}
