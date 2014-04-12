<?php

require_once 'db.php';
require_once 'anecdote.php';

creerCategorie($_POST['new_categorie']);

?>
<script type="text/javascript">
    alert("La catégorie a été ajoutée.");
    window.location.replace("http://localhost/VieDeGeek/gestion_categorie.php");
</script>

