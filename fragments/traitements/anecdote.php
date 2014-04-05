<?php

require_once 'db.php';

function nbAnecdotes(){
	return requete('select count(*) from anecdote', true);
}

function anecdotesValidees($nbAnecdote){
	return requete("select * from anecdote,categorie where categorie.no_categorie = anecdote.ma_categorie and etat_anecdote = 1 order by date_creation_anecdote desc LIMIT 12 OFFSET " . $nbAnecdote, true);
}

function anecdotesAValidees(){
	return requete("select * from anecdote,categorie where categorie.no_categorie = anecdote.ma_categorie and etat_anecdote = 0 order by date_creation_anecdote desc LIMIT 12", true);
}

function anecdotesValideesControversees($nbAnecdote){
	return requete("select * from anecdote where etat_anecdote = 1 order by nb_like - nb_dislike asc LIMIT 12 OFFSET " . $nbAnecdote, true);
}

function anecdotesValideesMeilleures($nbAnecdote){
	return requete("select * from anecdote where etat_anecdote = 1 order by nb_like - nb_dislike desc LIMIT 12 OFFSET " . $nbAnecdote, true);
}

function anecdotesValideesAleatoires(){
	return requete("select * from anecdote where etat_anecdote = 1", true);
}

function countAnecdotesValideesAleatoires(){
	return requete("select count(*) from anecdote where etat_anecdote = 1", true);
}

function anecdoteUpvote($numAnecdote){
	return requete("update anecdote set nb_like = nb_like + 1 where num_anecdote = " . addslashes($numAnecdote));
}

function anecdoteAModerer(){
	return requete("select * from anecdote where etat_anecdote = 0 order by date_creation_anecdote asc", true);
}

function validerAnecdote($numAnecdote){
	return requete("update anecdote set etat_anecdote = 1 where num_anecdote = " . addslashes($numAnecdote));
}

function refuserAnecdote($numAnecdote){
	return requete("update anecdote set etat_anecdote = 3 where num_anecdote = " . addslashes($numAnecdote));
}

function anecdoteScore($numAnecdote){
	return requete("select nb_dislike, nb_like from anecdote where num_anecdote = " . addslashes($numAnecdote), true);
}

function ajouterAnecdote($libelleAnecdote, $numInscrit, $numCategorie){
	return requete ('Insert into anecdote(libelle_anecdote, etat_anecdote, nb_like, nb_dislike, date_creation_anecdote, num_inscrit, ma_categorie) values("' . addslashes($libelleAnecdote) . '", "0", 0, 0, now(), '.addslashes($numInscrit).','.addslashes($numCategorie).')');
}

function anecdoteDownvote($numAnecdote){
	return requete("update anecdote set nb_dislike = nb_dislike + 1 where num_anecdote = " . addslashes($numAnecdote));
}
function aVoter($numAnecdote,$numInscrit){
        return requete('Insert into lien_inscrit_anecdote(no_anecdote,no_inscrit) values("'.addslashes($numAnecdote).'","'.addslashes($numInscrit).'")');
}
function getVote($numAnecdote,$numInscrit){
        return requete("select * from lien_inscrit_anecdote where no_anecdote = " . addslashes($numAnecdote) . " and no_inscrit = " . addslashes($numInscrit), true);
}
function getUserAnecdote($login_inscrit,$nbAnecdote){
        return requete("select a.num_anecdote, a.libelle_anecdote, a.nb_like, a.nb_dislike, a.num_inscrit, a.date_creation_anecdote from anecdote a, inscrit i where a.num_inscrit = i.num_inscrit and etat_anecdote = 1 and nom_compte_inscrit = '".addslashes($login_inscrit)."' order by a.date_creation_anecdote desc LIMIT 12 OFFSET ".$nbAnecdote,true);       
}
function creerCategorie($libelle_categorie){
        return requete('Insert into categorie(libelle_categorie) values ("'.addslashes($libelle_categorie).'")');
}
function listerCategorie(){
        return requete("select* from categorie",true);
}

?>