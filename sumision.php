<?php 
$page_title = "Vie De Geek - Soumettre";
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/header.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/VieDeGeek/fragments/traitements/anecdote.php');
?>

<style type="text/css">
    #pub{
        opacity:0;
        height: 0%;
        width: 0%;
    }
    #text_pub{
        opacity:0;
        height: 0%;
        width: 0%;
        font-size: 0px;
    }
</style>

<div id="corp_validation">
    <div id="text_validation">
        <h3 align="center">Soumettre une anecdote</h3>
        <form  method="post" action="/VieDeGeek/fragments/traitements/trait_sumision.php">        
            <p align="center">
                <ul>
                    <li>Rappel du concept : Une anecdote qui commence par "Aujourd'hui" et qui se termine par "VieDeGeek".</li>
                    <li>Attention : Une anecdote écrite en SMS ou comportant trop de fautes d'orthographe <br> est toujours refusée.</li>
                    <li>N'utilisez pas cet espace pour des discussions, de la publicité ou pour tout autre texte n'étant pas une VieDeGeek.</li>
                </ul>
            </p>
            <table  align="center">
                <tr>
                    <td>
                    <textarea id="anecdote" name="anecdote" cols="50" rows="10" value="Aujourd'hui,"> Aujourd'hui, </textarea>
                    <br />
                    <span id="carac_reste_textarea_1">Il vous reste 286 caractères</span>
                    </td>
                </tr>         
            </table>
            
            <br>
            Catégorie : 
            <select name="categorie">
                <?php
                $les_categories = listerCategorie();
                var_dump($les_categories);
                foreach ($les_categories as $une_categorie) {
                    ?>
                
                    <option value="<?php echo $une_categorie['no_categorie'] ?>"> <?php echo $une_categorie['libelle_categorie'] ?> </option>
                    
                    <?php
                }
                ?>
            </select>
            
            <p align="center"><input type="submit" name="submit_anecdote" value="Valider" /><input type="button" onclick="reset()" value="Reset" /></p> 
        </form>
    </div>
</div>
<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>