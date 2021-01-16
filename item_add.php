<?php 

	require 'db_connect.php';
    $codeno=$_POST['codeno'];
	$name = $_POST['name'];
	
	$photo= $_FILES['photo'];
	$price=$_POST['price'];
	
	$discount=$_POST['discount'];
	$description=$_POST['description'];
	$brandid = $_POST['brandid'];
   


	$basepath='backend/images/item/';
    $fullpath=$basepath.$photo['name'];
    move_uploaded_file($photo['tmp_name'], $fullpath);

	$sql = "INSERT INTO items (codeno,name, photo,price,discount,description, brand_id) VALUES (:value1, :value2, :value3, :value4,:value5,:value6,:value7)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $codeno);
	$stmt->bindParam(':value2', $name);
	$stmt->bindParam(':value3', $fullpath);
	$stmt->bindParam(':value4', $price);
	$stmt->bindParam(':value5', $discount);
	$stmt->bindParam(':value6', $description);
	$stmt->bindParam(':value7', $brandid);
	



	$stmt->execute();

	header('location: item_list.php');














?> 