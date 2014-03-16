<?php

require_once 'db.php';

function seLoguer($username, $mdp){
    return requete("select * from inscrit where etat_inscrit = 1 and nom_compte_inscrit = '".addslashes($username)."' and mdp_inscrit = '".addslashes($mdp)."'",true);
}

function showUsers(){
    return requete("select * from inscrit", true);
}

function infoUser($num_inscrit){
    return requete("select * from inscrit where num_inscrit = ".addslashes($num_inscrit),true);
}

function activerInscrit($num_inscrit){
    return requete("update inscrit set etat_inscrit = 1 where num_inscrit = ".addslashes($num_inscrit),"update");
}

function recupererCodeVerification($num_inscrit){
    return requete("select code_verification from inscrit where num_inscrit = ".addslashes($num_inscrit),true);
}

function supprimerUtilisateur($num_inscrit){
    return requete("delete from inscrit where num_inscrit = ".addslashes($num_inscrit));
}

function modifierUtilisateur($num_inscrit, $nom, $prenom, $mail){
    return requete("update inscrit set nom_inscrit ='".addslashes($nom)."', prenom_inscrit ='".addslashes($prenom)."', adresse_mail_inscrit ='".addslashes($mail)."' where num_inscrit = ".addslashes($num_inscrit));
}

function creerUtilisateur($nom, $prenom, $pseudo, $mail, $mdp, $code_vérif){
    return requete("insert into inscrit(nom_inscrit,prenom_inscrit,nom_compte_inscrit,mdp_inscrit,adresse_mail_inscrit, code_verification,etat_inscrit,admin)VALUES('".addslashes($nom)."','".addslashes($prenom)."','".addslashes($pseudo)."','".addslashes($mdp)."','".addslashes($mail)."','".addslashes($code_vérif)."',1,0)");
}

function verifLogin($username){
    return requete("select count(*) from inscrit where nom_compte_inscrit = '" . addslashes($username) . "'", true);
}

function envoyerMail($pseudo, $mail, $code_verification){
    
    ini_set("SMTP","smtp.live.com");           

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}addslashes($#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
            $passage_ligne = "\r\n";
    }
    else
    {
            $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format HTML.
    $message_html = "
        <html>
            <head></head>
            <body>
                <b>Bonjour ".$pseudo.",</b> <br><br>
                Merci pour votre inscription. <br>
                Votre code d'activation est le suivant : ".$code_verification." <br><br>
                Cordialement,<br> 
                L'equipe VDG. 
            </body>
        </html>";
    var_dump($message_html);
    //=====Création de la boundary
    $boundary = "-----=".md5(rand());

    //=====Définition du sujet.
    $sujet = "Code d'activation VDG";

    //=====Création du header de l'e-mail.
    $header = "From: \"VDG\"<equipe.vdg@gmail.fr>".$passage_ligne;
    $header.= "Reply-to: \"VDG\"<equipe.vdg@gmail.fr>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"addslashes($boundary\"".$passage_ligne;
    //==========

    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========
    var_dump($message);
    //=====Envoi de l'e-mail.
    mail($mail, $sujet, $message, $header);

}

?>