<?php
$page_title = "Vie De Geek - Index";
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/header.php');
require_once 'fragments/traitements/db.php';
require_once 'fragments/traitements/anecdote.php';
require_once 'fragments/traitements/inscrit.php';
require_once "fragments/traitements/fonctions.php";
?>

<?php
if (!isset($_GET['numPage']) || $_GET['numPage'] < 0 || $_GET['numPage'] == "" || $_GET['numPage'] > nbPagesAnecdotes()) {
    $_GET['numPage'] = 1;
}
if($_GET['numPage'] > 0){
    $anecdotes = anecdotesValidees(($_GET['numPage']-1)*12);
}else if($_GET['numPage'] == 1){
    $anecdotes = anecdotesValidees(0);
}
foreach ($anecdotes as $uneAnecdote) {
    $inscrit = infoUser($uneAnecdote['num_inscrit']);
?>
    <div id="anecdotes">
        <a href="komento.php?id=<?php echo $uneAnecdote['num_anecdote']; ?>">
            <div id="text_anecdotes">
            <?php echo $uneAnecdote['libelle_anecdote'] ?>
        </a>
            <div id="split"></div>                          
                <div id="votes">
                <em> Postée par <a  style="color: red;" href="inscrit_anecdotes.php?login_inscrit=<?php echo $inscrit[0]['nom_inscrit'] ?>"> <?php echo $inscrit[0]['nom_inscrit'] ?> </a> le <?php echo reformeDate($uneAnecdote['date_creation_anecdote']); ?>
                    <?php if (isset($_SESSION['login'])) { ?>
                        : <img height="1%"width="1.5%" src="res/img/fleche_haut.png" alt="up" title="Up vote" onmouseover="this.style.cursor = 'pointer';" onclick="upVote(<?php echo $uneAnecdote['num_anecdote']; ?>)"/>
                        <img height="1%"width="1.5%" src="res/img/fleche_bas.png" alt="down" title="Down vote" onmouseover="this.style.cursor = 'pointer';" onclick="downVote(<?php echo $uneAnecdote['num_anecdote']; ?>)"/>
                        / Points : <?php } ?><label id="<?php echo $uneAnecdote['num_anecdote']; ?>"><?php echo $uneAnecdote['nb_like'] - $uneAnecdote['nb_dislike'] ?></label>
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
            $nbPages = nbPagesAnecdotes();

            if($_GET['numPage']-1 > 0){
            ?>
            <td><a class="numPage" href="index.php?numPage=<?php echo $_GET['numPage']-1 ?>">Page pr&eacute;c&eacute;dente</a></td>
            <td><div id="split_page"></div></td>
            <?php
            }
            for($i=0; $i<$nbPages; $i++){
                if($i > 0){
            ?>
                <td><div id="split_page"></div></td>
                <?php
                }
                ?>
                <td><a class="numPage" href="index.php?numPage=<?php echo $i+1 ?>" <?php if(($i+1) == $_GET['numPage']){ ?>style="color: white; background-color: #2a757b;"<?php } ?>><?php echo $i+1; ?></a></td>
            <?php
            }
            if($_GET['numPage']+1 <= $nbPages){
            ?>
                <td><div id="split_page"></div></td>
                <td><a class="numPage" href="index.php?numPage=<?php echo $_GET['numPage']+1; ?>">Page suivante</a></td>
            <?php
            }
            $date = explode("-", $uneAnecdote['date_creation_anecdote']);
            ?>
        </tr>
    </table>
</div>

<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/shared/footer.php');
?>

