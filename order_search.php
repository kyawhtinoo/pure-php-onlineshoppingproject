<?php 

	require 'db_connect.php';

	$start = $_POST['start'];
	$end = $_POST['end'];

	$sql = 'SELECT * FROM orders WHERE orderdate Between :value1 AND :value2';
	$stmt= $conn->prepare($sql);
	$stmt->bindParam(':value1', $start);
	$stmt->bindParam(':value2', $end);
	$stmt->execute();

	$searchResults = $stmt->fetchAll();

	echo json_encode($searchResults);


?> 