<?php
  require 'db_connect.php';
  session_start();
  $email=$_POST['email'];
  $password=$_POST['password'];

   $sql="SELECT users.*, model_has_roles.role_id,roles.name as rolname
          FROM users 
          INNER JOIN model_has_roles
          ON users.id=model_has_roles.user_id
          INNER JOIN roles
          ON model_has_roles.role_id=roles.id
          WHERE email=:value1 AND password=:value2";
   $stmt=$conn->prepare($sql);
   $stmt->bindParam(':value1',$email);
   $stmt->bindParam(':value2',$password);
   $stmt->execute();
   $user=$stmt->fetch(PDO::FETCH_ASSOC);
 // var_dump($user['rolname']);
 // die();
   if ($stmt->rowCount()<= 0 ) {
   	  $_SESSION['login_fail']='Your current email and password is invaild.';
      header('location:login.php');
   }

   else{
   	$_SESSION['login_user'] = $user;

   if ($user['rolname'] == "admin") {
   	 header('location:dashboard.php');
   }
     else{header('location:index.php');}
   
   }













 ?>