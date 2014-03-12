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
</style>

<div id="corp_soumission">
    <div id="text_soumission">
        <h3 align="center">S'enregistrer</h3>
        <form method="post" action="fragments/shared/enregistrer.php">
            <table id="table" align="center">
                <tr>
                    <td><label> Login : </label></td>     
                    <td><input type="text" id="id" name="login" obigatoire="true" required/></td>
                    <td><label id="loginf"></label></td>
                </tr>
                <tr>
                    <td><label> Mot de passe : </label></td>     
                    <td><input type="password" name="mdp" required/></td>
                </tr>
                <tr>
                    <td><label id="password"> Confirmation du mot de passe : </label></td>     
                    <td><input type="password" name="confirm_mdp" required/></td>
                    <td><label id="passwordf"></label>
                </tr>
                <tr>
                    <td><label> Adresse e-mail : </label></td>     
                    <td> <input type="email" name="mail" required/></td>
                </tr>          
            </table>
            <p align="center"><input type="submit" name="enregistrer" value="S'enregistrer !"></p>
        </form>     
    </div>
</div>
<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>

