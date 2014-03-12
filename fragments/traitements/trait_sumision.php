<?php
session_start();
require_once 'db.php';
require_once 'anecdote.php';
require_once 'inscrit.php';


ajouterAnecdote($_POST['anecdote'], $_SESSION['id']);
header("Location: ../../index.php");

?>