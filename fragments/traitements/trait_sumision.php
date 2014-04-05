<?php
session_start();
require_once 'db.php';
require_once 'anecdote.php';
require_once 'inscrit.php';


$test = ajouterAnecdote($_POST['anecdote'], $_SESSION['id'],$_POST['categorie']);

header("Location: ../../index.php");

?>