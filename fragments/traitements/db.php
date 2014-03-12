<?php

function requete($requete, $select = false){
	$server = 'mysql:host=localhost';
	$bdd = 'dbname=vdg';
	$user= 'vdg';
	$mdp= 'secret';
	$monPdoVdg = null;
	$pdo = new PDO($server.';'.$bdd, $user, $mdp);
	$pdo->query("SET CHARACTER SET utf8");

	if($select == true){
		$result = $pdo->query($requete);
		$result = $result->fetchAll();
	}else{
		$result = $pdo->exec($requete);
	}
	return $result;
}
?>