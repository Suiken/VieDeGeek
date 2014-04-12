<?php
$page_title = "Vie De Geek - Commentaires";
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/header.php');
require_once 'fragments/traitements/db.php';
require_once 'fragments/traitements/anecdote.php';
require_once 'fragments/traitements/inscrit.php';
require_once 'fragments/traitements/fonctions.php';
?>

<?php
$anecdote = getAnecdote($_GET['id']);
$inscrit = infoUser($anecdote[0]['num_inscrit']);
$commentaires = getCommentaires($_GET['id']);
?>
<div id="anecdotes">
    <div id="text_anecdotes">
        <?php echo $anecdote[0]['libelle_anecdote'] ?>
        <div id="split"></div>
        <div id="votes">
            <em> Postée par <a style="color: white; font-weight: bold; text-decoration: underline;" href="inscrit_anecdotes.php?login_inscrit=<?php echo $inscrit[0]['nom_compte_inscrit'] ?>"><?php echo $inscrit[0]['nom_compte_inscrit'] ?> </a> le <?php echo reformeDate($anecdote[0]['date_creation_anecdote']) ?> : 
                <?php if (isset($_SESSION['login'])) { ?>
                    <img height="1%"width="1.5%" src="res/img/fleche_haut.png" alt="up" title="Up vote" onmouseover="this.style.cursor='pointer';" onclick="upVote(<?php echo $anecdote[0]['num_anecdote']; ?>)"/>
                    <img height="1%"width="1.5%" src="res/img/fleche_bas.png" alt="down" title="Down vote" onmouseover="this.style.cursor='pointer';" onclick="downVote(<?php echo $anecdote[0]['num_anecdote']; ?>)"/>
                    <?php } ?>  / Points : <label id="<?php echo $anecdote[0]['num_anecdote']; ?>"><?php echo $anecdote[0]['nb_like'] - $anecdote[0]['nb_dislike'] ?></label>
                <label id="e<?php echo $anecdote[0]['num_anecdote']; ?>"></label>
            </em>
        </div>
    </div>
</div>


<div id="anecdotes" style="background-color : whitesmoke;  border: 0px">
        <div id="text_anecdotes"  style="background-color : whitesmoke">
        <form method="POST" action="/VieDeGeek/fragments/traitements/commentaire.php">
            <div align="center">
            <textarea name="commentaire" placeholder="Ecrivez votre commentaire..." cols="50" rows="10"></textarea>
            <button type="submit">Envoyer</button>
            <input type="hidden" id="numAnecdote" name="numAnecdote" value="<?php echo $anecdote[0]['num_anecdote']; ?>" />
            </div>
        </form>
        </div>
    <div id="commentaire">
        <?php
        foreach ($commentaires as $commentaire) {
                $auteur = infoUser($commentaire['num_inscrit']);
        ?>
        <div id="text_commentaire">
            <?php echo $commentaire['commentaire'] ?> <br>
            <div id="split"></div> 
            <div id="votes">  
                Posté par : <?php echo $auteur[0]['nom_compte_inscrit'] . " le " . reformeDate($commentaire['date_creation_commentaire']) ?> :
                <img height="1%"width="1.5%" src="res/img/fleche_haut2.png" alt="up" title="Up vote" onmouseover="this.style.cursor='pointer';" onclick="upvoteCom(<?php echo $commentaire['num_commentaire']; ?>)"/>
                <img height="1%"width="1.5%" src="res/img/fleche_bas2.png" alt="down" title="Down vote" onmouseover="this.style.cursor='pointer';" onclick="downvoteCom(<?php echo $commentaire['num_commentaire']; ?>)"/>
                 / Points :    <?php echo $commentaire['nb_like'] - $commentaire['nb_dislike'] . " points" ?><br/>                  
            <label id="e<?php echo $commentaire['num_commentaire']; ?>"></label>
 
            </div>
        </div>
        <div id="split2"></div> 
<?php
}
?>
       
    </div>
</div>
<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/footer.php');
?>