<?php
$activate = "index";
@include('inc/header.php');
?>
    <section class="home-slider owl-carousel js-fullheight">
      <div class="slider-item js-fullheight" style="background-image: url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
            	<span class="subheading">FOXXOF</span>
              <h1 class="mb-4">Nhà hàng tốt nhất</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
            	<span class="subheading">FOXXOF</span>
              <h1 class="mb-4">Bổ dưỡng&amp; Ngon miệng</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
            	<span class="subheading">FOXXOF</span>
              <h1 class="mb-4">Đặc sản ngon</h1>
            </div>

          </div>
        </div>
      </div>
    </section>

    
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-12 text-center heading-section ftco-animate">
          	<span class="subheading">Dịch vụ</span>
            <h2 class="mb-4">Dịch vụ ăn uống</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
            <div class="media block-6 services d-block">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-cake"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Tiệc sinh nhật</h3>
                <!-- <p>Sẵn sàng cho bữa tiệc sinh nhật của bạn</p> -->
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
            <div class="media block-6 services d-block">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-meeting"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Buổi họp mặt làm ăn</h3>
                <!-- <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p> -->
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
            <div class="media block-6 services d-block">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-tray"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Tiệc cưới</h3>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row no-gutters justify-content-center mb-5 pb-2">
          <div class="col-md-12 text-center heading-section ftco-animate">
          	<span class="subheading">Đặc sản</span>
            <h2 class="mb-4">Menu</h2>
          </div>
        </div>
        <div class="row no-gutters d-flex align-items-stretch">
			<?php
				$product_new = $product->getproduct_new();
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
		</section>

		<section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.1">
			<div class="container">
				<div class="row d-flex">
          <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
          	<div class="heading-section ftco-animate mb-5 text-center">
	          	<span class="subheading">Đặt bàn</span>
	            <h2 class="mb-4">Đặt bàn</h2>
	          </div>
            <form action="reservation.php">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" placeholder="Họ tên của bạn">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" placeholder="Email của bạn">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại của bạn">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Ngày</label>
                    <input type="text" class="form-control" id="book_date" placeholder="Chọn ngày đặt bàn">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Giờ</label>
                    <input type="text" class="form-control" id="book_time" placeholder="Chọn giờ đặt bàn">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Số người</label>
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                        <option value="">Số người</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4+</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-group text-center">
                    <input type="submit" value="Đặt bàn" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
			</div>
		</section>
		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Tin tức</span>
            <h2 class="mb-4">FOXXOF</h2>
          </div>
        </div>
				<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text pt-3 pb-4 px-4">
                <div class="meta">
                  <div><a href="#">Sept. 06, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                </div>
                <h3 class="heading"><a href="blog.php">Thưởng thức những món ăn ngon ở Châu Á</a></h3>
                <p class="clearfix">
                  <a href="blog.php" class="float-left read">Xem thêm</a>
                  <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text pt-3 pb-4 px-4">
                <div class="meta">
                  <div><a href="#">Sept. 06, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                </div>
                <h3 class="heading"><a href="#">Thưởng thức những món ăn ngon ở Châu Á</a></h3>
                <p class="clearfix">
                  <a href="blog.php" class="float-left read">Xem thêm</a>
                  <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text pt-3 pb-4 px-4">
                <div class="meta">
                  <div><a href="#">Sept. 06, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                </div>
                <h3 class="heading"><a href="blog.php">Thưởng thức những món ăn ngon ở Châu Á</a></h3>
                <p class="clearfix">
                  <a href="blog.php" class="float-left read">Xem thêm</a>
                  <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
              </div>
            </div>
          </div>
        </div>
			</div>
		</section>
<?php
@include('inc/footer.php');
?>
    		
    