<?php
	require_once 'inscrit.php';
	$login = $_POST['login'];
	$result = verifLogin($login);
	if($result[0][0] >= 1){
		echo "Failure";
	}else{
		echo "Success";
	}
?>