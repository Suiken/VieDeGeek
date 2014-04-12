<?php
	
	require_once "anecdote.php";

	function reformeDate($dateBase){
		$dateBase = explode("-", $dateBase);
		switch($dateBase[1]){
			case "01":
				$mois = "Janvier";
				break;
			case "02":
				$mois = "Février";
				break;
			case "03":
				$mois = "Mars";
				break;
			case "04":
				$mois = "Avril";
				break;
			case "05":
				$mois = "Mai";
				break;
			case "06":
				$mois = "Juin";
				break;
			case "07":
				$mois = "Juillet";
				break;
			case "08":
				$mois = "Août";
				break;
			case "09":
				$mois = "Septembre";
				break;
			case "10":
				$mois = "Octobre";
				break;
			case "11":
				$mois = "Novembre";
				break;
			case "12":
				$mois = "Décembre";
				break;
			default:
				$mois = "";
				break;
		}
		$date = $dateBase[2] . " " . $mois . " " . $dateBase[0];
		return $date;
	}

	function nbPagesAnecdotes(){
		$anecdotes = nbAnecdotes();
		$nbPages = intval($anecdotes[0][0]/12);
		return $nbPages;
	}