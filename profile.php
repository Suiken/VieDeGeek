<?php 
$page_title = "Vie De Geek - Index";
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/header.php');
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
        <h3 align="center">Mes informations personnelles</h3>
        <form method="post" action="fragments/traitements/trait_modif.php">
            <table id="table" align="center">
                <tr>
                    <td><label> Login : </label></td>     
                    <td><span name="login"><?= $_SESSION['login']; ?></span></td>
                </tr>
                <tr>
                    <td><label> Nom : </label></td>     
                    <td><input id="nom" type="text" required="true" name="nom" value="<?= $_SESSION['nom']; ?>"/></td>
                </tr>
                <tr>
                    <td><label> Pr&eacute;nom : </label></td>     
                    <td><input id="prenom" type="text" name="prenom" required="true" value="<?= $_SESSION['prenom']; ?>"/></td>
                </tr>
                <tr>
                    <td><label> Adresse e-mail : </label></td>     
                    <td> <input id="mail" type="email" name="mail" required="true" value="<?= $_SESSION['email']; ?>"/></td>
                </tr>          
            </table>
             <p align="center"><input type="submit" value="Valider"></p>
        </form>
    </div>
</div>

<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>