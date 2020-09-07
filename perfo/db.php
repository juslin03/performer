<?php

// parametres de la connexion a la base de donnees
$host = 'http://performer.ci:2083';
$dbname = 'performe_db';
$user = 'performe_user';
$pass = 'N#kFr#%8KZ3t';
$reg_date = Date('Y-m-d H:i:s');
try {
    $conn = new PDO("mysql:host = $host; dbname = $dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'succcess';
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>
