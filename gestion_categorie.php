<?php
$page_title = "Vie De Geek - Catégorie";
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/header.php');
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

<div id="conditions">
    <div id="text_conditions">
        <table>
            <tr>
                <th>Nom</th>
                <th>Action</th>
            </tr>
            <?php
            $categories = listerCategorie();
            foreach ($categories as $une_categorie) {
                ?>
                <tr>
                    <td><?= $une_categorie['libelle_categorie'] ?></td>
                    <td><a font="black" href="fragments/traitements/bo_suppr_categorie.php?libelle=<?php echo $une_categorie['libelle_categorie'] ?>">Supprimer</a></td>
                </tr>  
                <?php
            }
            ?>
        </table>
        <br>

        <form method="post" action="fragments/traitements/bo_ajouter_categorie.php">
            Créer une catégorie : <input type="text" name="new_categorie">
            <input type="submit" value="Ajouter">
        </form>
    </div>
</div>

<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/footer.php');
?>
