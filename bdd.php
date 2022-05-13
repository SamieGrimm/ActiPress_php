<?php
// connexion à la base de données

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// $mysqli = new mysqli("localhost", "root", "", "actipress");


try {
    $dbh = new PDO('mysql:host=localhost;dbname=actipress', 'root', '');
    // foreach($dbh->query('SELECT * FROM membre') as $row) {
        // print_r($row);
    // }
    // $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}