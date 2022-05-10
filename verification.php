<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $pseudo = $_POST['username'];
    $mdp = $_POST['password'];

    if ($pseudo !== "" && $mdp !== "") {
        $pdo = new PDO('mysql:host=localhost; dbname=actipress', 'root', '');
        $stmt = $pdo->prepare('SELECT * FROM membre WHERE PSEUDO = :pseudo AND MOT_DE_PASSE = :mdp');
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->bindValue(':mdp', $mdp);
        $stmt->execute();
        var_dump($stmt->fetch());
        // $result = fetch($stmt, PDO::FETCH_ASSOC);
        $count = $reponse['count(*)'];
        if ($count != 0) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['username'] = $username;
            header('Location: principale.php');
        } else {
            header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    } else {
        header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
} else {
    header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
