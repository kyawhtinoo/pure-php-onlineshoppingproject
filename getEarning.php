<?php 
  include "db_connect.php";


  $janFirst=strtotime('first day of January');
  $janLast=strtotime('last day of January');

  $janStart= date('Y-m-d',$janFirst);
  $janEnd= date('Y-m-d',$janLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$janStart);   
  $stmt->bindParam(':value2',$janEnd);    
  $stmt->execute();
  $janResult=$stmt->fetch(PDO::FETCH_ASSOC);

  // var_dump($janResult);  



$febFirst=strtotime('first day of February');
  $febLast=strtotime('last day of February');

  $febStart= date('Y-m-d',$febFirst);
  $febEnd= date('Y-m-d',$febLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$febStart);   
  $stmt->bindParam(':value2',$febEnd);    
  $stmt->execute();
  $febResult=$stmt->fetch(PDO::FETCH_ASSOC);


  $marchFirst=strtotime('first day of March');
  $marchLast=strtotime('last day of March');

  $marchStart= date('Y-m-d',$marchFirst);
  $marchEnd= date('Y-m-d',$marchLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$marchStart);   
  $stmt->bindParam(':value2',$marchEnd);    
  $stmt->execute();
  $marchResult=$stmt->fetch(PDO::FETCH_ASSOC);


  $aprilFirst=strtotime('first day of April');
  $aprilLast=strtotime('last day of April');

  $aprilStart= date('Y-m-d',$aprilFirst);
  $aprilEnd= date('Y-m-d',$aprilLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$aprilStart);   
  $stmt->bindParam(':value2',$aprilEnd);    
  $stmt->execute();
  $aprilResult=$stmt->fetch(PDO::FETCH_ASSOC);


  $mayFirst=strtotime('first day of May');
  $mayLast=strtotime('last day of May');

  $mayStart= date('Y-m-d',$mayFirst);
  $mayEnd= date('Y-m-d',$mayLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$mayStart);   
  $stmt->bindParam(':value2',$mayEnd);    
  $stmt->execute();
  $mayResult=$stmt->fetch(PDO::FETCH_ASSOC);



  $juneFirst=strtotime('first day of June');
  $juneLast=strtotime('last day of June');

  $juneStart= date('Y-m-d',$juneFirst);
  $juneEnd= date('Y-m-d',$juneLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$juneStart);   
  $stmt->bindParam(':value2',$juneEnd);    
  $stmt->execute();
  $juneResult=$stmt->fetch(PDO::FETCH_ASSOC);



  $julyFirst=strtotime('first day of July');
  $julyLast=strtotime('last day of July');

  $julyStart= date('Y-m-d',$julyFirst);
  $julyEnd= date('Y-m-d',$julyLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$julyStart);   
  $stmt->bindParam(':value2',$julyEnd);    
  $stmt->execute();
  $julyResult=$stmt->fetch(PDO::FETCH_ASSOC);





  $augustFirst=strtotime('first day of August');
  $augustLast=strtotime('last day of August');

  $augustStart= date('Y-m-d',$augustFirst);
  $augustEnd= date('Y-m-d',$augustLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$augustStart);   
  $stmt->bindParam(':value2',$augustEnd);    
  $stmt->execute();
  $augustResult=$stmt->fetch(PDO::FETCH_ASSOC);




  $sepFirst=strtotime('first day of September');
  $sepLast=strtotime('last day of September');

  $sepStart= date('Y-m-d',$sepFirst);
  $sepEnd= date('Y-m-d',$sepLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$sepStart);   
  $stmt->bindParam(':value2',$sepEnd);    
  $stmt->execute();
  $sepResult=$stmt->fetch(PDO::FETCH_ASSOC);




  $octFirst=strtotime('first day of October');
  $octLast=strtotime('last day of October');

  $octStart= date('Y-m-d',$octFirst);
  $octEnd= date('Y-m-d',$octLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$octStart);   
  $stmt->bindParam(':value2',$octEnd);    
  $stmt->execute();
  $octResult=$stmt->fetch(PDO::FETCH_ASSOC);





  $novFirst=strtotime('first day of November');
  $novLast=strtotime('last day of November');

  $novStart= date('Y-m-d',$novFirst);
  $febEnd= date('Y-m-d',$novLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$novStart);   
  $stmt->bindParam(':value2',$novEnd);    
  $stmt->execute();
  $novResult=$stmt->fetch(PDO::FETCH_ASSOC);



  $decFirst=strtotime('first day of December');
  $decLast=strtotime('last day of December');

  $decStart= date('Y-m-d',$decFirst);
  $decEnd= date('Y-m-d',$decLast);
  
  $sql="SELECT COALESCE(SUM(total),0) AS total
        FROM orders WHERE orderdate BETWEEN :value1 AND :value2";

  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1',$decStart);   
  $stmt->bindParam(':value2',$decEnd);    
  $stmt->execute();
  $decResult=$stmt->fetch(PDO::FETCH_ASSOC);


  $total=array(
   $janResult['total'], $febResult['total'], $marchResult['total'], $aprilResult['total'], $mayResult['total'], $juneResult['total'], $julyResult['total'], $augustResult['total'], $sepResult['total'],  $octResult['total'],$novResult['total'], $decResult['total']

  );
  // var_dump($total);
  echo json_encode($total);


?>