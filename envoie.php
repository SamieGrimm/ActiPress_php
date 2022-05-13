<?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style_envoie.css" media="screen" type="text/css" />
</head>

<body>

    <h1>Formulaire de contact</h1>

    <form name="formulaire" method="POST" action="envoie_email.php">

            <div class="u-form-email u-form-group u-form-group-2">
                <input type="text" name="email" id="email" required placeholder="Email destinataire" />
            </div>
            <div class="u-form-email u-form-group u-form-group-2">
                <input type="text" name="sujet" id="sujet" required placeholder="Objet" />
            </div>
            <div class="u-form-group u-form-message u-form-group-3">
                <textarea name="message" id="message" required placeholder="Message..." rows="10"></textarea>
            </div>

            <div class="u-align-left u-form-group u-form-submit u-form-group-4">

                <input type="submit" value="Envoyer" />
                <input type="reset" alt="Effacer les champs" value="Effacer" />

            </div>
        </div>
    </form>

</body>

</html>