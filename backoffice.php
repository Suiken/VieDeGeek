<?php 
$page_title = "Vie De Geek - Back Office";
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/header.php');
require_once 'fragments/traitements/db.php';
require_once 'fragments/traitements/anecdote.php';
require_once 'fragments/traitements/inscrit.php';
?>
<style type="text/css">
    #pub{
        display: none;
    }
    #text_pub{
        display: none;
    }
    table, td, th {
        border: 1px solid black
    }
    table{
        margin: auto;
    }
</style>
<table>
<?php
$inscrits = showUsers();
    foreach ($inscrits as $inscrit) {
?>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Login</th>
        <th>MDP</th>
        <th>Email</th>
        <th>Etat</th>
        <th>Action</th>
    </tr>
    <tr>
		<td><?=$inscrit['num_inscrit'] ?></td>
		<td><?=$inscrit['nom_inscrit'] ?></td>
		<td><?=$inscrit['prenom_inscrit'] ?></td>
		<td><?=$inscrit['nom_compte_inscrit'] ?></td>
		<td><?=$inscrit['mdp_inscrit'] ?></td>
		<td><?=$inscrit['adresse_mail_inscrit'] ?></td>
		<td><?=$inscrit['etat_inscrit'] ?></td>
                <td><a href="fragments/traitements/bo_suppr_inscrit.php?id=<?php echo $inscrit['num_inscrit'] ?>">Supprimer</a></td>
    </tr>


<?php
    }
?>
</table>
<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>