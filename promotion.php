<?php 
   require 'frontendheader.php';
?>

	
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Promotion Item </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">


		<div class="row">
            <div class="col">
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title"> Discount </h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                     <div class="owl-carousel owl-theme bbb_viewed_slider"> 
                  <?php 
		            		$sql = "SELECT * FROM items WHERE discount != '' ORDER BY rand()  LIMIT 8";
		            		

		            		$stmt = $conn->prepare($sql);
		            		$stmt->execute();

		            		$discountItems = $stmt->fetchAll();

		            		foreach ($discountItems as $discountItem) {
		            		
		            		$di_id = $discountItem['id'];
		            		$di_name = $discountItem['name'];
		            		$di_price = $discountItem['price'];
		            		$di_discount = $discountItem['discount'];
		            		$di_photo = $discountItem['photo'];
		            		$di_codeno = $discountItem['codeno'];
		            	?>

                  
					   

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					        		<img src="<?= $di_photo ?>" class="img-fluid">
					            	<p class="text-truncate"><?= $di_name; ?></p>
					            	<p class="item-price">
					            		<strike><?= $di_discount; ?> </strike> 
					            		<span class="d-block"><?= $di_price; ?></span>
					            	</p>

					                <div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
										</ul>
									</div>

									<a href="#" class="addtocartBtn text-decoration-none ATC_" 
								   data-id="<?= $di_id ?>" 
								   data-name= "<?= $di_name ?>"
								   data-price="<?= $di_price ?>" 
								   data-discount="<?=$di_discount ?>" 
								   data-photo="<?= $di_photo ?>"
                                   data-codeno="<?= $di_codeno ?>"
                                             >Add to Cart</a>
					        	</div>
					        </div>
					    </div>
                     <?php } ?>
					    

					    

					</div>
                </div>
            </div>
        </div>

	</div>
	
<?php 
   require 'frontendfooter.php';
?>	