<?php 

 $servername="localhost";
 $dbname="batch19";

 $user="root";
 $password="";

 $dsn= "mysql:host=$servername; dbname=$dbname";

 $pdo=new PDO($dsn,$user,$password);

 try{
 	$conn=$pdo;

 	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 	// echo "Connected sussessfully.";
 }
 catch(PDOException $e){
 	echo "Connection Failed".$e->getMessage();
 	 }


?>