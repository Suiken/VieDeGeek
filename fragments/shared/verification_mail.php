<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/inscrit.php';

$num_inscrit = $_POST[''];
$code_verif = $_POST['code_verif'];

$recup_num = recupererCodeVerification($num_inscrit);

if (strlen($code_verif) = $recup_num ){
        activerInscrit($num_inscrit);
        header('Location: ../../verification.php');
    } else {
        header('Location: ../../erreur.php');  
    }

?>