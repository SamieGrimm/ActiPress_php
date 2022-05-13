<?php
session_start();
include 'bdd.php';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
    <?php
    // afficher un message
    echo 'Bonjour ' . $_SESSION['NOM'] . ', vous êtes connecté <br>';
    if (isset($_GET['statut'])) {
        echo $_GET['statut'];
    }
    echo '<br>';
    if (isset($_SESSION['message'])) {
        // echo '<pre>';
        // print_r($_SESSION['message']);
        // echo '</pre>';
        // echo 'test';
        for ($i = 0; $i <= count($_SESSION['message']) - 1; $i++){
            echo $_SESSION['message'][$i] . '<br>';
        }
    }
    ?>
    <form action="actualiser.php" method="POST">
        <input type="submit" value="Actualiser">
    </form>
    <form action="envoie.php" method="POST">
        <input type="submit" value="Envoyer email">
    </form>
    <form action="fermeture.php" method="POST">
        <input type="submit" value="Déconnexion">
    </form>
</body>

</html>