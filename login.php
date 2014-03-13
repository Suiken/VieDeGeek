<?php 
$page_title = "Vie De Geek - Login";
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/header.php');
?>

<style type="text/css">
    #pub{
        display: none;
    }
    #text_pub{
        display: none;
    }
    #passwordf{
        display: none;
    }
    #idf{
        display: none;
    }
    #mailf{
        display: none;
    }
</style>

<div id="corp_soumission">
    <div id="text_soumission">
        <h3 align="center">S'enregistrer</h3>
        <form id="connexion" method="post" action="fragments/shared/enregistrer.php">
            <table id="table" align="center">
                <tr>
                    <td><label> Login : </label></td>     
                    <td><input type="text" id="id" name="login" obligatoire="true" required/></td>
                    <td><label id="idf"></label></td>
                </tr>
                <tr>
                    <td><label> Mot de passe : </label></td>     
                    <td><input id="password1" type="password" name="password1" required/></td>
                    <td><label id="password1f"></label>
                </tr>
                <tr>
                    <td><label> Confirmation du mot de passe : </label></td>     
                    <td><input id="password2" type="password" name="password2" required/></td>
                    <td><label id="password2f"></label>
                </tr>
                <tr>
                    <td><label> Adresse e-mail : </label></td>     
                    <td><input id="mail" type="email" name="mail" required/></td>
                    <td><label id="mailf"></label></td>
                </tr>          
            </table>
            <p align="center"><input type="submit" name="enregistrer" value="S'enregistrer !"></p>
        </form>     
    </div>
</div>
<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>

