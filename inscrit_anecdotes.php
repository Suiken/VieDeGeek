<?php
$page_title = "Vie De Geek - Les meilleures";
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/header.php');
require_once 'fragments/traitements/db.php';
require_once 'fragments/traitements/anecdote.php';
require_once 'fragments/traitements/inscrit.php';
?>

<?php
if (!isset($_GET['nbAnecdotes'])) {
    $_GET['nbAnecdotes'] = 0;
}

$login_inscrit = $_GET['login_inscrit'];

$anecdotes = getUserAnecdote($login_inscrit, $_GET['nbAnecdotes']);
?>

<h1>Les anecdotes de l'utilisateur : <?php echo $login_inscrit; ?></h1>

<?php
foreach ($anecdotes as $uneAnecdote) {
    $inscrit = infoUser($uneAnecdote['num_inscrit']);
    ?>

    <div id="anecdotes">
        <div id="text_anecdotes">
            <?php echo $uneAnecdote['libelle_anecdote'] ?>
            <div id="split"></div>
            <div id="votes">
                <em> Postée par <a  style="color: white; font-weight: bold; text-decoration: underline;"><?php echo $inscrit[0]['nom_inscrit'] ?></a> le <?php echo $uneAnecdote['date_creation_anecdote'] ?> 
                    <?php if (isset($_SESSION['login'])) { ?>
                        : <img height="1%"width="1.5%" src="res/img/fleche_haut.png" alt="up" title="Up vote" onclick="upVote(<?php echo $uneAnecdote['num_anecdote']; ?>)"/>
                        <img height="1%"width="1.5%" src="res/img/fleche_bas.png" alt="down" title="Down vote" onclick="downVote(<?php echo $uneAnecdote['num_anecdote']; ?>)"/>
                         <?php } ?>  / Points : <label id="<?php echo $uneAnecdote['num_anecdote']; ?>"><?php echo $uneAnecdote['nb_like'] - $uneAnecdote['nb_dislike'] ?></label>
                    <label id="e<?php echo $uneAnecdote['num_anecdote']; ?>"></label>     
                   / Categorie : <a href="categorie_anecdotes.php?libelle_categorie=<?php echo $uneAnecdote['libelle_categorie'] ?>"> <?php echo $uneAnecdote['libelle_categorie'] ?> </a>
                </em>
            </div>
        </div>
    </div>
    <?php
}
?>

<div id="bas_de_page">
    <table align="center">
        <tr>
            <?php
            $precedent = intval($_GET['nbAnecdotes']) - 12;
            $nbAnecdotes = nbAnecdotes();
            $suivant = intval($_GET['nbAnecdotes']) + 12;
            if ($precedent >= 0) {
                ?>
                <td><a id="valider" href="inscrit_anecdotes.php?login_inscrit=<?php echo $login_inscrit?>&nbAnecdotes=<?php echo $precedent ?>">Page précédente</a></td>
                <?php
            }
            if ($suivant <= $nbAnecdotes[0][0]) {
                ?>
                <td><a id="valider" href="inscrit_anecdotes.php?login_inscrit=<?php echo $login_inscrit?>&nbAnecdotes=<?php echo $suivant ?>">Page suivante</a></td>
                <?php
            }
            ?>
        </tr>
    </table>
</div>

<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/footer.php');
?>