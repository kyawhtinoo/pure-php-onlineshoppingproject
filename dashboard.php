<?php 
  require 'backendheader.php';
  require 'db_connect.php';

  date_default_timezone_set("Asia/Rangoon");
  $todaydate=date('Y-m-d');

  $sql="SELECT count(id) as orderTotal FROM orders WHERE orderdate = :value1";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':value1', $todaydate);
  $stmt->execute();
  $orderCount=$stmt->fetch(PDO::FETCH_ASSOC);




 $roleid=2;
 $sql="SELECT count(users.id) as customerTotal FROM users INNER JOIN model_has_roles
 ON users.id=model_has_roles.user_id
 WHERE model_has_roles.role_id=:value2";
 $stmt=$conn->prepare($sql);
 $stmt->bindParam(':value2',$roleid);
 $stmt->execute();
 $customerCount=$stmt->fetch(PDO::FETCH_ASSOC);


 $sql="SELECT count(brands.id) as brandTotal FROM brands";
 $stmt=$conn->prepare($sql);
 $stmt->execute();
 $brandCount=$stmt->fetch(PDO::FETCH_ASSOC);


 $sql="SELECT count(items.id) as itemTotal FROM items";
 $stmt=$conn->prepare($sql);
 $stmt->execute();
 $itemCount=$stmt->fetch(PDO::FETCH_ASSOC);

?>

  

   <div class="app-title">
       <div>
          <h1><i class="icofont-dashboard"></i></i> Dashboard</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class=" icon icofont-prestashop"></i>
            <div class="info">
              <h4>Today Order</h4>
              <p><b><?= $orderCount['orderTotal'] ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class=" icon icofont-ui-user-group"></i>
            <div class="info">
              <h4>Customers</h4>
              <p><b><?= $customerCount['customerTotal'] ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class=" icon icofont-badge"></i>
            <div class="info">
              <h4>Brands</h4>
              <p><b><?= $brandCount['brandTotal'] ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon icofont-box"></i>
            <div class="info">
              <h4>Items</h4>
              <p><b><?= $itemCount['itemTotal']  ?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Monthly Sales</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        
      </div>

<?php 
   require 'backendfooter.php';
?>