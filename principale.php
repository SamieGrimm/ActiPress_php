<?php
session_start();
include 'bdd.php';
include 'fonction.php';
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <!-- <link rel="stylesheet" href="style.css" media="screen" type="text/css" /> -->
</head>
<style>
    form {display: inline;}
</style>
<body>
    <?php
    start();
    actualiser();
    afficheEmail();
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
    <?php 
        if ($_SESSION['CODE_PROFIL'] == 1) {
            createUser();
        }
        if ($_SESSION['CODE_PROFIL'] == 2) {
            allEmail();
        }
    ?>
</body>

</html>