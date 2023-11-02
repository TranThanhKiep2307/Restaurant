<?php
$activate = "contact";
@include('inc/header.php');
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Liên hệ</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> <span>Liên hệ với chúng tới <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
						<h2 class="h4 mb-2 mb-md-5 font-weight-bold">Liên hệ với chúng tôi</h2>
						<form action="#">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Họ tên của bạn">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email của bạn">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Địa chỉ của bạn">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Lời nhắn của bạn"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Gửi" class="btn btn-primary py-3 px-5">
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7906871911864!2d105.78347907475415!3d10.03412409007305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a1bbe2da77%3A0x780e866b3e9801a6!2sKing%20BBQ%20Buffet%20Sense%20City%20C%E1%BA%A7n%20Th%C6%A1!5e0!3m2!1svi!2s!4v1695120112261!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</section>
		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4 font-weight-bold">Thông tin liên hệ</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Địa chỉ:</span> Đại học Cần Thơ</p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Số điện thoại:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
		
<?php
@include('inc/footer.php');
?>