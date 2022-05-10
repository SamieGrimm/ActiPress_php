<?php
session_start();
print_r($_SESSION);
?>

<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
    <div id="content">
        <!-- tester si l'utilisateur est connecté -->
        <?php
        if (isset($_SESSION['username'])) {
            // afficher un message
            echo 'Bonjour ' . $_SESSION['username'] . ', vous êtes connecté';
        }
        ?>

    </div>
</body>

</html>