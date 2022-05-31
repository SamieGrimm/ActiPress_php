<?php
include 'bdd.php';
include 'fonction.php';

$stmt = $dbh->prepare('SELECT * FROM destiner d JOIN message m ON d.CODE_MESSAGE = m.CODE_MESSAGE');
$stmt->execute();
$result = $stmt->fetchAll();

$listEmail = array();

for ($i = 0; $i <= count($result) - 1; $i++) {
    // echo '<pre>';
    // print_r ($result[$i]);
    // echo '</pre>';

    $email = array();
    array_push(
        $email,
        $result[$i]['CODE_MESSAGE'],
        $result[$i]['CODE_MEMBRE'],
        $result[$i]['email_destinataire'],
        $result[$i]['EMETTEUR'],
        $result[$i]['DATE_HEURE_D_ENVOIE'],
        $result[$i]['SUJET'],
        $result[$i]['TEXT'],
        $result[$i]['DATE_HEURE_DE_SUPPRESSION'],
        $result[$i]['ETAT']
    );

    array_push($listEmail, $email);
}

// echo '<pre>';
// print_r($listEmail);
// echo '</pre>';

?>

<html>

<body>
    <?php if (isset($listEmail)) {
        for ($i = 0; $i <= count($listEmail) - 1; $i++) { ?>
            <?php echo 'CODE_MESSAGE : ' . $listEmail[$i][0] . '<br>' .
                'CODE_MEMEBRE : ' . $listEmail[$i][1] . '<br>' .
                'DESTINATAIRE : ' . $listEmail[$i][2] . '<br>' .
                'EMETTEUR : ' . $listEmail[$i][3] . '<br>' .
                'DATE/HEURE_ENVOIE : ' . $listEmail[$i][4] . '<br>' .
                'SUJET : ' . $listEmail[$i][5] . '<br>' .
                'TEXT : ' . $listEmail[$i][6] . '<br>' .
                'DATE/HEURE_SUPPRESSION : ' . $listEmail[$i][7] . '<br>' .
                'ETAT : ' . $listEmail[$i][8]; ?>

            <form action='supr_def.php?email=<?php echo $listEmail[$i][0] ?>' method="POST">
                <input type="submit" value="Supprimer définitivement">
            </form>
    <?php }
    }
    retour(); ?>
</body>

</html>