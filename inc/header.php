<?php
  	@include('./connect.php');
	@include('config/config.php');
	@include('lib/session.php');
  	@include_once('lib/database.php');
  	@include_once('helpers/format.php');

	Session::init();
?>
<?php
	spl_autoload_register(function ($class) {
		include 'classes/' . $class . '.php';
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$product = new product();
	$mn = new menu();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<link rel="shortcut icon" href="images/logo.png" type="">
    <title>FOX-RESTAURANT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">FOXXOF</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item <?php echo ($activate == "index" ? "active" : "")?>"><a href="index.php" class="nav-link">Trang chủ</a></li>
	        	<li class="nav-item <?php echo ($activate == "about" ? "active" : "")?>"><a href="about.php" class="nav-link">Giới thiệu</a></li>
	        	<li class="nav-item <?php echo ($activate == "menu" ? "active" : "")?>"><a href="menu.php" class="nav-link">Thực đơn</a></li>
	        	<li class="nav-item <?php echo ($activate == "blog" ? "active" : "")?>"><a href="blog.php" class="nav-link">Tin tức</a></li>
	          	<li class="nav-item <?php echo ($activate == "contact" ? "active" : "")?>"><a href="contact.php" class="nav-link">Liên hệ</a></li>
			  	<li class="nav-item cta"><a href="reservation.php" class="nav-link">Đặt bàn</a></li>
				  <?php 
								$login_check = session::get('user'); 
								if($login_check==false){ 
									echo ''; 
								}else{ 
									echo '<li class="nav-item cta"><a class="nav-link" href="datmon.php">Đặt món</a></li>'; 
								}	
								?>
				  <?php
						if(isset($_GET['KH_MA'])){
							Session::destroy();
							}
					?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
					data-mdb-toggle="dropdown" aria-expanded="false">Tài khoản</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<?php 
								$login_check = session::get('user'); 
								if($login_check==false){ 
									echo '<li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
										<li><a class="dropdown-item" href="dangky.php">Đăng ký</a></li>'; 
								}else{ 
									echo '<li><a class="dropdown-item">Xin chào '.session::get('KH_TEN').'</a></li>
									<li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>'; 
								}	
								?>
						<!-- <li>
							<a class="dropdown-item" href="#">Đăng xuất</a>
						</li> -->
					</ul>
				</li>
				  <!-- <?php
							$login_check = session::get('user');
							if($login_check == true){
								echo '';
							}else{
								echo '<li class="nav-item <?php echo ($activate == "login" ? "active" : "")?>"><a href="login.php" class="nav-link icon-user"></a></li>';
							}
						?>
				  <?php
							$login_check = session::get('user');
							if($login_check== false){
								echo '';
							}else{
								echo '<li class="nav-item' . ($activate == "profile" ? "active" : "").'"><a href="profile.php" class="nav-link">Xin chào '.session::get('KH_TEN').'</a></li>';
							}
						?> -->
	        </ul>    
	      </div>
	    </div>
	  </nav>
	  <style>
      /* Điều chỉnh kiểu hiển thị của dropdown */
      .menu {
          list-style-type: none;
          padding: 0;
          margin: 0;
      }

      .nav-item {
          position: relative; /* Để làm cho dropdown-menu hiển thị tương đối */
      }

      .dropdown-menu {
          display: none; /* Ẩn dropdown ban đầu */
          position: absolute; /* Hiển thị tuyệt đối trong khoảng cách của nav-item */
          top: 100%; /* Hiển thị bên dưới nav-item */
          left: 0;
          background-color: white;
          border: 1px solid #ddd;
          padding: 10px;
          min-width: 200px;
      }

      /* Hiển thị dropdown khi nav-link được hover hoặc click */
      .nav-item:hover .dropdown-menu {
          display: block;
      }

    </style>
    <!-- END nav -->