<?php

require_once 'db.php';
require_once 'anecdote.php';

supprimerCategorie($_GET['libelle']);

header("Location: ../../gestion_categorie.php");

?>
