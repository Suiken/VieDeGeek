<?php
session_start();
require_once 'db.php';
require_once 'anecdote.php';
require_once 'inscrit.php';


ajouterCommentaire($_POST['numAnecdote'], $_POST['commentaire'], $_SESSION['id']);
header("Location: ../../komento.php?id=".$_POST['numAnecdote']);

?>