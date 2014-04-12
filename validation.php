<?php 
$page_title = "Vie De Geek - Aléatoire";
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

<?php
    $nbAnecdotes = nbAnecdotes();
    $anecdotes = anecdotesAValidees(intval($nbAnecdotes[0][0]));
    foreach ($anecdotes as $uneAnecdote) {
        $inscrit = infoUser($uneAnecdote['num_inscrit']);
?>
<div id="corp_validation">
    <div id="text_validation">
        <?php  echo $uneAnecdote['libelle_anecdote'] ?>
        <div id="split"></div>
        <div id="votes">
            Postée par  <em style="color: red;"> <?php echo $inscrit[0]['nom_inscrit'] ?></em> le <?php echo $uneAnecdote['date_creation_anecdote'] ?>
            <div align ="center">
                <em>
                    <a id="valider" href="fragments/shared/validation_vdg.php?var=true&var2=<?php echo $uneAnecdote[0]; ?> ">Valider</a> /
                    <a id="valider" href="fragments/shared/validation_vdg.php?var=false&var2=<?php echo $uneAnecdote[0]; ?> ">Refuser</a> 
                </em>
            </div>
        </div>
    </div>
</div>
 <?php
    }
 ?>

<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>
