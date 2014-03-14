<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/traitements/inscrit.php';

$pseudo = $_POST['login'];
$mdp = $_POST['password1'];
$confirm_mdp = $_POST['password2'];
$mail = $_POST['mail'];
$nom = null;
$prenom= null;
$code_verif = rand(0000000000, 9999999999);


creerUtilisateur($nom,$prenom,$pseudo,$mail,$mdp, $code_verif);
?>
<script type="text/javascript">
    alert("Vous êtes maintenant enregistré. Vous pouvez dès à présent vous connecter sur le site");
    window.location.replace("http://localhost/VieDeGeek/login.php");
</script>
