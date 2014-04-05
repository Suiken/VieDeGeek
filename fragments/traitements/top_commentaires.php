<?php
	
	require_once 'inscrit.php';

	$top3 = afficherTop3Aime();

	echo json_encode($top3);

?>