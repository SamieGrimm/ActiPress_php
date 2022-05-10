<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    // connexion à la base de données
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost", "root", "", "actipress");

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username !== "" && $password !== "") {
        $stmt = $mysqli->prepare("SELECT * FROM membre WHERE pseudo=? AND mot_de_passe=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($district);
        $result = $stmt->fetch();
        if (isset($result)) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['username'] = $username;
            header('Location: principale.php');
        } else {
            header('Location: login.php?erreur=1&username=' . $username . '&password=' . $password . '&requete=' . $requete . '&reponse' . $result); // utilisateur ou mot de passe incorrect
        }
    } else {
        header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
} else {
    header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
