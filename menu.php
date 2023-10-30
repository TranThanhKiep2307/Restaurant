<?php
$activate = "menu";
@include('inc/header.php');
?>
<?php
	
?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Menu</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> <span>Thực đơn <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section">
    	<div class="container">
        <div class="ftco-search">
					<div class="row">
            <div class="col-md-12 nav-link-wrap">
	            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<?php
					
				?>
	              <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Combo rẻ</a>

	              <a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Lẩu</a>

	              <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Nướng</a>

	              <a class="nav-link ftco-animate" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Rượu</a>

	              <a class="nav-link ftco-animate" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Món kèm</a>

	              <a class="nav-link ftco-animate" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Kem</a>

	
	            </div>
	          </div>
	          <div class="col-md-12 tab-wrap">
	            
	            <div class="tab-content" id="v-pills-tabContent">

				<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					  	<?php
						$product_menu = $mn ->getproduct_menu();
						if($product_menu){
							while($result = $product_menu ->fetch_assoc()){
						?>
					        	<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        		<div class="menus d-sm-flex ftco-animate align-items-stretch">
					              <div class="menu-img img" style="background-image: url(images/<?php echo $result['TA_HINHANH']?>);"></div>
					              <div class="text d-flex align-items-center">
													<div>
						              	<div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $result['CB_TEN']?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price"><?php echo $result['CTTA_DONGIA'].' '.'Đ'?></span>
							                </div>
							              </div>
							              <p><span><?php echo $result['TA_TEN']?></span></p>
							              <p><a href="reservation.php" class="btn btn-primary">Đặt ngay</a></p>
						              </div>
					              </div>
					            </div>
					        </div>  
						<?php
							}
						}
						?>
					    </div>
	              </div>
					
	              <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="day-2-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					  	<?php
						$product_new = $product->getproduct_lau();
						if($product_new){
							while($result = $product_new ->fetch_assoc()){
						?>
					        	<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        		<div class="menus d-sm-flex ftco-animate align-items-stretch">
					              <div class="menu-img img" style="background-image: url(images/<?php echo $result['TA_HINHANH']?>);"></div>
					              <div class="text d-flex align-items-center">
													<div>
						              	<div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $result['LTA_TEN']?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price"><?php echo $result['CTTA_DONGIA'].' '.'Đ'?></span>
							                </div>
							              </div>
							              <p><span><?php echo $result['TA_TEN']?></span></p>
							              <p><a href="reservation.php" class="btn btn-primary">Đặt ngay</a></p>
						              </div>
					              </div>
					            </div>
					        </div>  
						<?php
							}
						}
						?>
					    </div>
	              </div>

	            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					  <?php
						$product_nuong = $product->getproduct_nuong();
						if($product_nuong){
							while($result = $product_nuong ->fetch_assoc()){
						?>
					        	<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        		<div class="menus d-sm-flex ftco-animate align-items-stretch">
					              <div class="menu-img img" style="background-image: url(images/<?php echo $result['TA_HINHANH']?>);"></div>
					              <div class="text d-flex align-items-center">
													<div>
						              	<div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $result['LTA_TEN']?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price"><?php echo $result['CTTA_DONGIA'].' '.'Đ'?></span>
							                </div>
							              </div>
							              <p><span><?php echo $result['TA_TEN']?></span></p>
							              <p><a href="reservation.php" class="btn btn-primary">Đặt ngay</a></p>
						              </div>
					              </div>
					            </div>
					        </div>
						<?php
							}
						}
						?>
					</div>
	          	</div>

				  <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-day-4-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					  <?php
						$product_ruou = $product->getproduct_ruou();
						if($product_ruou){
							while($result = $product_ruou ->fetch_assoc()){
						?>
					        	<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        		<div class="menus d-sm-flex ftco-animate align-items-stretch">
					              <div class="menu-img img" style="background-image: url(images/<?php echo $result['TA_HINHANH']?>);"></div>
					              <div class="text d-flex align-items-center">
													<div>
						              	<div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $result['LTA_TEN']?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price"><?php echo $result['CTTA_DONGIA'].' '.'Đ'?></span>
							                </div>
							              </div>
							              <p><span><?php echo $result['TA_TEN']?></span></p>
							              <p><a href="reservation.php" class="btn btn-primary">Đặt ngay</a></p>
						              </div>
					              </div>
					            </div>
					        </div>
						<?php
							}
						}
						?>
					</div>
	          	</div>

				  <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-day-5-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					  <?php
						$product_monkem = $product->getproduct_monkem();
						if($product_monkem){
							while($result = $product_monkem ->fetch_assoc()){
						?>
					        	<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        		<div class="menus d-sm-flex ftco-animate align-items-stretch">
					              <div class="menu-img img" style="background-image: url(images/<?php echo $result['TA_HINHANH']?>);"></div>
					              <div class="text d-flex align-items-center">
													<div>
						              	<div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $result['LTA_TEN']?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price"><?php echo $result['CTTA_DONGIA'].' '.'Đ'?></span>
							                </div>
							              </div>
							              <p><span><?php echo $result['TA_TEN']?></span></p>
							              <p><a href="reservation.php" class="btn btn-primary">Đặt ngay</a></p>
						              </div>
					              </div>
					            </div>
					        </div>
						<?php
							}
						}
						?>
					</div>
	          	</div>

				  <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-day-6-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					  <?php
						$product_kem = $product->getproduct_kem();
						if($product_kem){
							while($result = $product_kem ->fetch_assoc()){
						?>
					        	<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        		<div class="menus d-sm-flex ftco-animate align-items-stretch">
					              <div class="menu-img img" style="background-image: url(images/<?php echo $result['TA_HINHANH']?>);"></div>
					              <div class="text d-flex align-items-center">
													<div>
						              	<div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $result['LTA_TEN']?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price"><?php echo $result['CTTA_DONGIA'].' '.'Đ'?></span>
							                </div>
							              </div>
							              <p><span><?php echo $result['TA_TEN']?></span></p>
							              <p><a href="reservation.php" class="btn btn-primary">Đặt ngay</a></p>
						              </div>
					              </div>
					            </div>
					        </div>
						<?php
							}
						}
						?>
					</div>
	          	</div>

				  
				
	        </div>
        </div>
    	</div>
    </section>
		
<?php
@include('inc/footer.php');
?>