<?php
	
	require_once 'inscrit.php';

	$top3 = afficherTop3Poste();

	echo json_encode($top3);

?>