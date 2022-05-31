<?php
include 'fonction.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
?>

<html>

<body>
    <form method="post" action="insertUser.php">
        <p>
            Rang de l'utilisateur : 
            <input type="radio" name="rang" value="1" id="admin"> <label for="admin">Administrateur</label>
            <input type="radio" name="rang" value="2" id="gest"> <label for="gest">Gestionnaire</label>
            <input type="radio" name="rang" value="3" id="collab"> <label for="collab">Collaborateur</label>
        </p>
        <p><label>Nom</label> : <input type="text" name="nom" required></p>
        <p><label>Prenom</label> : <input type="text" name="prenom" required></p>
        <p><label>Téléphone</label> : <input type="tel" name="telephone" required></p>
        <p><label>Email</label> : <input type="email" name="email" required></p>
        <p><label>Pseudo</label> : <input type="text" name="pseudo" required></p>
        <p><label>Mot de passe</label> : <input type="text" name="mdp" required></p>

        <input type="submit" value="Créer">
    </form>
    <?php
        retour();
    ?>
</body>

</html>