<?php

function start()
{
    // afficher un message
    echo 'Bonjour ' . $_SESSION['PRENOM'] . ', vous êtes connecté <br>';
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

function actualiser()
{
    include 'bdd.php';

    $stmt = $dbh->prepare('SELECT * FROM destiner d 
                    JOIN message m ON d.CODE_MESSAGE = m.CODE_MESSAGE
                    WHERE m.ETAT = 1
                    AND d.email_destinataire = \'' . $_SESSION['EMAIL'] . '\'');
    $stmt->execute();
    $result = $stmt->fetchAll();

    $_SESSION['message'] = array();

    for ($i = 0; $i <= count($result) - 1; $i++) {
        $info = array();
        array_push($info, $result[$i]['EMETTEUR'], $result[$i]['SUJET'], $result[$i]['TEXT'], $result[$i]['CODE_MESSAGE'], $result[$i]['DATE_HEURE_D_ENVOIE']);
        array_push($_SESSION['message'], $info);
    }
}

function createUser()
{
    echo '<form name="formulaire" method="POST" action="createUser.php">';
    echo '<input type="submit" value="Nouvel utilisateur" />';
    echo '</form>';
}

function allEmail()
{
    echo '<form name="formulaire" method="POST" action="allEmail.php">';
    echo '<input type="submit" value="Voir tout les email" />';
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
<?php echo '<br>';
        }
    }
}
