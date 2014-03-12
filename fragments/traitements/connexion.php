<?php

require_once 'inscrit.php';

$pseudo = $_POST['login'];
$mdp = $_POST['mdp'];

$user =  seLoguer($pseudo,$mdp);

echo "avant";

if ($user <> null){
    session_start();
    $_SESSION['id'] = $user[0]['num_inscrit'];
    $_SESSION['login'] = $user[0]['nom_compte_inscrit'];
    $_SESSION['nom'] = $user[0]['nom_inscrit'];
    $_SESSION['prenom'] = $user[0]['prenom_inscrit'];
    $_SESSION['email'] = $user[0]['adresse_mail_inscrit'];
    $_SESSION['admin'] = $user[0]['admin'];
    var_dump($user);
}

header('Location: ../../index.php');
exit();



?>
