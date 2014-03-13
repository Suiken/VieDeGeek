<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/inscrit.php';

$pseudo = $_POST['login'];
$mdp = $_POST['mdp'];
$confirm_mdp = $_POST['confirm_mdp'];
$mail = $_POST['mail'];
$nom = null;
$prenom= null;
$code_verif = rand(0000000000, 9999999999);

if (strlen($mdp) >= 5 ){
    if ($mdp == $confirm_mdp){
        creerUtilisateur($nom,$prenom,$pseudo,$mail,$mdp, $code_verif);
        echo "Success";
        // envoyerMail($pseudo, $mail, $code_verif);
//        header('Location: ../../verification.php');
       header('Location: ../../login.php');
    } else {
    	echo "Failure";
        header('Location: ../../login.php');
    }
} else {
	echo "Failure";
   header('Location: ../../login.php');
}
?>
