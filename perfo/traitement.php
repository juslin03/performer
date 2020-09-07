<?php

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

if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $datenaissance = $_POST['datenaissance'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $commune = $_POST['commune'];
    $form_survey = $_POST['form_survey'];
    $genre = $_POST['genre'];
    $projet_survey = $_POST['projet_survey'];
    $nomprojet = $_POST['nomprojet'];
    $tic_survey = $_POST['tic_survey'];
    $info_survey = $_POST['info_survey'];
    $projet_desc = $_POST['activity'];
    $lien = $_POST['lien'];

    $req = $conn->prepare(
        'INSERT INTO performer.users SET nom = :nom, prenom = :prenom, datenaissance = :datenaissance, email = :email, phone = :phone, commune = :commune, form_survey = :form_survey, genre = :genre, projet_survey = :projet_survey, nomprojet = :nomprojet, tic_survey = :tic_survey, info_survey = :info_survey, projet_desc = :projet_desc, lien = :lien, reg_date = :reg_date'
    );
    $req->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'datenaissance' => $datenaissance,
        'email' => $email,
        'phone' => $phone,
        'commune' => $commune,
        'form_survey' => $form_survey,
        'genre' => $genre,
        'projet_survey' => $projet_survey,
        'nomprojet' => $nomprojet,
        'tic_survey' => $tic_survey,
        'info_survey' => $info_survey,
        'projet_desc' => $projet_desc,
        'lien' => $lien,
        'reg_date' => $reg_date,
    ]);

    die('success');
}
?>
