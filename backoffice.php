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
</style>

<div id="corp_validation">
    <div id="text_validation">
			<table align="center">
			    <tr>
			        <th>ID</th>
			        <th>Nom</th>
			        <th>Prénom</th>
			        <th>Login</th>
			        <th>Email</th>
			        <th>Etat</th>
			        <th>Action</th>
			    </tr>
			<?php
			$inscrits = showUsers();
			    foreach ($inscrits as $inscrit) {
			?>
			    <tr>
				<td><?=$inscrit['num_inscrit'] ?></td>
				<td><?=$inscrit['nom_inscrit'] ?></td>
				<td><?=$inscrit['prenom_inscrit'] ?></td>
				<td><?=$inscrit['nom_compte_inscrit'] ?></td>
				<td><?=$inscrit['adresse_mail_inscrit'] ?></td>
				<td><?=$inscrit['etat_inscrit'] ?></td>
				<td><a style="color: red;" href="fragments/traitements/bo_suppr_inscrit.php?id=<?php echo $inscrit['num_inscrit'] ?>">Supprimer</a></td>
			    </tr>
			    
			<?php
			    }
			?>
			</table>
	</div>
</div>

<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>
