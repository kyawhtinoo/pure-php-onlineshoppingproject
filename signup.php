<?php 
  require 'db_connect.php';
  session_start();
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  
  
  $role=2;

  $sql="INSERT INTO users (name,phone,address,email,password) VALUES (:value1,:value2,:value3,:value4,:value5)";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$name);
  $stmt->bindParam(':value2',$phone);
  $stmt->bindParam(':value3',$address);
  $stmt->bindParam(':value4',$email);
  $stmt->bindParam(':value5',$password);
  $stmt->execute();

  $userid=$conn->lastInsertId();

  $sql="INSERT INTO model_has_roles (user_id,role_id) VALUES (:value1,:value2)";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$userid);
  $stmt->bindParam(':value2', $role);
  $stmt->execute();

  $_SESSION['regsuccess']='Yes,it is not easy,but you did it! Please signin Again';




  header('location:login.php');




?>