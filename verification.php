<?php 
$page_title = "Vie De Geek - Vérification";
include ($_SERVER['DOCUMENT_ROOT'].'VieDeGeek/fragments/shared/header.php');
?>

<style type="text/css">
    #pub{
        display: none;
    }
    #text_pub{
        display: none;
    }
</style>

<div id="corp_login">
    <div id="login">
        <h3 align="center">Vérification de l'adresse email</h3>
        <p> Un mail a été envoyé sur votre adresse email. Afin de completer
        votre  inscription veiller inscrire si dessousle code joint dans le mail.</p>
        <form method="post" action="meilleurs.php">
            <table id="table" align="center">
                <tr>
                    <td><label for="login"> Code de vérification : </label></td>     
                    <td><input type="text" name="code_verif" required/></td>
                </tr>     
            </table>
            <p align="center"><input type="submit" name="lien1" value="Connexion"></p> 
        </form>
    </div>
</div>

<?php
include ($_SERVER['DOCUMENT_ROOT'].'VieDeGeek/fragments/shared/footer.php');
?>

