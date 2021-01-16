<?php 
    require 'db_connect.php';
	require ('backendheader.php');
    $sql = "SELECT items.*, brands.id as cid, brands.name as bname 
            FROM items 
            LEFT JOIN  brands 
            ON items.brand_id = brands.id
            ORDER BY id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $items = $stmt->fetchAll();

    //  $sql = "SELECT items.*, subcategories.id as subid, subcategories.name as subname 
    //         FROM items 
    //         LEFT JOIN  subcategories 
    //         ON items.brand_id = subcategories.id
    //         ORDER BY id DESC";

    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $items = $stmt->fetchAll();
?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Item </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="item_new.php" class="btn btn-outline-primary">
            <i class="icofont-plus"></i>
        </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codeno</th>
                                <th>Name</th>
                                <th> Photo </th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th> Description </th>
                                <th> Brand </th>
                                <!-- <th> Subcategory </th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $i = 1;
                                foreach($items as $item){

                                $id = $item['id'];
                                $codeno=$item['codeno'];
                                $name = $item['name'];
                                $photo=$item['photo'];
                                $price=$item['price'];
                                $discount=$item['discount'];
                                $description=$item['description'];
                               
                                $cid = $item['brand_id'];
                                $bname = $item['bname'];

                                // $subid=$item['subcategory_id'];
                                // $subname=$item['subname'];
                            ?>
                            <tr>
                                <td> <?= $i++; ?>. </td>
                                <td> <?= $codeno; ?> </td>
                                <td> <?= $name; ?> </td>
                                <td> <img src=" <?=  $photo ?> " width='100' height='100'> </td>
                                <td> <?= $price; ?> </td>
                                <td> <?= $discount; ?> </td>
                                 <td> <?= $description; ?> </td>
                                <!-- <td> <?= $brand; ?> </td> -->

                                <td> <?= $bname; ?> </td>
                               <!--  <td> <?= $subname; ?> </td> -->
                                 
                                <!-- <td> <?= $bname; ?> </td> -->
                                <td>
                                    <a href="item_edit.php?id=<?= $id ?>" class="btn btn-warning">
                                        <i class="icofont-ui-settings"></i>
                                    </a>

                                   <!--  <a href="" class="btn btn-outline-danger">
                                        <i class="icofont-close"></i>
                                    </a> -->
                                     <form action="item_delete.php" onsubmit="return confirm('Are you sure want to delete?')" method="POST" class="d-inline-block">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <button class="btn btn-outline-danger">
                                           <i class="icofont-close"></i>
                                        </button>
                                        </form>
                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

	require ('backendfooter.php');
?>