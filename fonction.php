<?php

function start()
{
    // afficher un message
    echo 'Bonjour ' . $_SESSION['NOM'] . ', vous êtes connecté <br>';
    if (isset($_GET['statut'])) {
        echo $_GET['statut'];
    }
    echo '<br>';
}

function retour()
{
    echo '<form name="formulaire" method="POST" action="principale.php">';
    echo '<input type="submit" value="Retour" />';
    echo '</form>';
}

function afficheEmail()
{
    if (isset($_SESSION['message'])) {
        for ($i = 0; $i <= count($_SESSION['message']) - 1; $i++) { ?>

            <form action='reception.php?email=<?php echo $i ?>' method="POST">
                <?php echo 'EMETTEUR : ' . $_SESSION['message'][$i][0] . ' | SUJET : ' . $_SESSION['message'][$i][1]; ?>
                <input type="submit" value="Voir">
            </form>
            
            <form action='supr_email.php?email=<?php echo $_SESSION['message'][$i][3] ?>' method="POST">
                <input type="submit" value="Supprimer">
            </form>

            
            <?php echo'<br>';
        }
    }
}
