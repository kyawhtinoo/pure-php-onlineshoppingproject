<?php  
  require 'frontendheader.php';
  require 'db_connect.php';


$userid = $_SESSION['login_user']['id'];

  $sql = "SELECT * FROM orders WHERE user_id = :value1 ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1', $userid);
    $stmt->execute();
    $orders = $stmt->fetchAll();


?>
  <!-- Subcategory Title -->
  <div class="jumbotron jumbotron-fluid subtitle">
      <div class="container">
        <h1 class="text-center text-white">Your Order History </h1>
      </div>
  </div>
  
  <!-- Content -->
  <div class="container mt-5">
  

    <div class="row justify-content-center">
      <?php 
        foreach ($orders as $order){

        $id = $order['id'];
                $orderdate = $order['orderdate'];
                $voucherno = $order['voucherno'];
                $total = $order['total'];
                $status = $order['status'];
      ?>
      <div class="col-sm-4 my-3">
          <div class="card orderCard">
        
              <div class="card-body">
                <h5 class="card-title"> <?= $voucherno ?> </h5>
                <h6 class="card-text">  <?= $orderdate ?> </h6>
                 <p class="text-white card-text float-right">  <?php if ($status=="Order") {
              ?>
              <span class="bg-warning"><?= $status ?></span>
          <?php } elseif ($status=="Cancel") { ?>
           
             <span class="bg-danger"><?= $status ?></span>
           <?php } else{ ?>
              <span class="bg-success"><?= $status ?></span>
           
          <?php }  ?> </p>

                <a href="javascript:void(0)" class="btn btn-secondary mainfullbtncolor btn-sm orderDetail" data-id="<?= $id; ?>" data-orderdate="<?= $orderdate ?>" data-voucherno="<?= $voucherno; ?>" data-total="<?= $total; ?>" data-status="<?= $status; ?>">
               Detail
            </a>

              </div>
          </div>
      </div>

      <?php 
        }
      ?>

    </div>
    

  </div>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"> 
              Order Detail
            </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-9">
                  <h5> Voucherno: <span id="invoiceNo"></span> </h5>
                  <h6> Date : <span id="dateNo"></span> </h6>


                </div>
                <div class="col-3" id="orderStatus">
                  
                </div>
              </div>

              <div class="col-12 mt-3">

                <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2"> Product </th>
                    <th> Qty </th>
                    <th> Price </th>
                    <th> Total </th>
                  </tr>
                </thead>
                <tbody id="orderDetail">
                </tbody>
                <tfoot id="shoppingcart_tfoot">
                  <tr>
                    <td colspan="8">
                      <h3 class="text-right"> Total : <span id="orderTotal"></span> </h3>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
              </div>

            </div>
          </div>
      </div>
  </div>
</div>
  
<?php 
  require('frontendfooter.php');
?>

