<?php
	
	require_once 'inscrit.php';

	$top3 = afficherTop3();

	echo json_encode($top3);

?>