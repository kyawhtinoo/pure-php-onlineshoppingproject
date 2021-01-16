<?php 

 require 'db_connect.php';

 $id=$_POST['id'];
 $name=$_POST['name'];
 $price=$_POST['price'];
 $discount=$_POST['discount'];
 $description=$_POST['description'];
 $brand=$_POST['brandid'];
 







 $oldphoto=$_POST['oldphoto'];

 $newphoto=$_FILES['photo'];

if ($newphoto['size']>0) {
         $basepath= 'backend/images/category/';
         $fullpath=$basepath.$newphoto['name'];
         move_uploaded_file($newphoto['tmp_name'], $fullpath);

}
else{
	$fullpath=$oldphoto;
}

$sql="UPDATE items  SET codeno=:value1,  name=:value2, photo=:value3 WHERE id=:value4";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':value1',$codeno);
$stmt->bindParam(':value2',$name);
$stmt->bindParam(':value3',$fullpath);
$stmt->bindParam(':value4',$id);



$stmt->execute();

header('location:item_list.php');




 

?>