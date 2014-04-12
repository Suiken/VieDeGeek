<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/inscrit.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/anecdote.php';

$etat = $_GET['var'];
$numAnecdote = $_GET['var2'];


if ($etat == 'true' ){
    validerAnecdote($numAnecdote);
    header('Location: ../../validation.php');
    } else {
        if( $etat == 'false'){
            refuserAnecdote($numAnecdote);
            header('Location: ../../validation.php');                                                   
        }
    }
?>
