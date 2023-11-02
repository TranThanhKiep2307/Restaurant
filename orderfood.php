<?php
ob_start();
$activate = "reservation";
@include('inc/header.php');
?>

<?php
  $id = Session::get('KH_MA');
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $addcart = $ct-> add_cart($_POST,$id);
} 
?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
              <h1 class="mb-2 bread">Order food</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> 
              <span>Orderfood <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-6 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-5">
		          	<span class="subheading">Order food</span>
		            <h2 class="mb-4">New order</h2>
		          </div>
	            <form onsubmit="showMessageBox()" action="" method="post">
	              <div class="row">
                  <?php 
                    if(isset($add_cart)){
                      echo $add_cart;
                    }
                	?>
                  <?php
                    $get_user = $us -> get_usersid($id);
                    if($get_user){
                      while($result_user = $get_user->fetch_assoc()){

                  ?>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Name</label>
	                    <input type="text" name="KH_TEN" class="form-control" value="<?php echo $result_user['KH_TEN']?>" >
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Email</label>
	                    <input id="email" type="text" name="KH_EMAILKH" class="form-control" value="<?php echo $result_user['KH_EMAIL']?>" >
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Phone</label>
	                    <input id="sdt" type="text" name="KH_SDT" class="form-control" value="<?php echo $result_user['KH_SDT']?>" >
	                  </div>
	                </div>
                  <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Address</label>
	                    <input id="dc" type="text" name="KH_DIACHI" class="form-control" value="<?php echo $result_user['KH_DIACHI']?>" >
	                  </div>
	                </div>
					        <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Meals</label>
                      <div class="select-wrap one-third">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select id="meal" name="TA_MA" class="form-control">
                            <?php
                            $getpd = $product->getproduct_name();
                            if ($getpd) {
                                while ($result_name = $getpd->fetch_assoc()) {
                                    echo '<option value= "' . $result_name['TA_MA'] . '">' . $result_name['TA_TEN'] . '</option>';
                                }
                            }
                            ?>
                        </select>

	                    </div>
	                  </div>
	                </div>
					      <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Quality</label>
	                    <input id="number" type="number" name="GH_SL" class="form-control" placeholder="Quality" min = "1">
	                  </div>
	                </div>
					      <div class="col-md-6">
	                <div class="form-group">
	                  <label for="">Notice</label>
	                  <textarea id="note" type="text" name="GH_GHICHU" class="form-control" placeholder="Notice..."></textarea>
	                </div>
	              </div>
	              <div class="col-md-12 mt-3">
	                <div class="form-group">
	                  <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Add order</button>
	                </div>
	              </div>
	              </div>
                <?php
                    }
                  }
                ?>
	            </form>
	          </div>
          </div>
      <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
        <div class="py-md-5">
          <div class="heading-section ftco-animate mb-5">
            <span class="subheading">Order food</span>
            <h2 class="mb-4">Your order</h2>
          </div>
          <form onsubmit="showMessageBox()" action="" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Name dishes</label>
                        <input type="text" name="TA_TEN" class="form-control" placeholder="" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Quality</label>
                        <input id="sl" type="number" name="GH_SL" class="form-control" placeholder="" min = "1">
                      </div>
                    </div>
                    <div class="col-md-12 mt-3">
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Payment</button>
                      </div>
                    </div>
                  </div>
                </form>
        </div>
      </div>
	  </div>
  </div>
</section>
    

<?php
@include('inc/footer.php');
?>