<?php
$activate = "login";
ob_start();
@include 'inc/header.php';
?>

<head>
    <link href="./css/login.css" rel="stylesheet" type="text/css" media="all" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
    <!--header start here-->
    <?php
   $login_check = session::get('user'); 
   if($login_check){ 
    //   header('Location:profile.php'); 
   }	
?>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $check_login = $us->login_user($_POST);
    }   
?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                    <h1 class="mb-2 bread">LOGIN</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Login <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <div class="header">
        <div class="header-main">
            <h3 class="py-md-5" style="text-align:center">Điền thông tin đăng nhập</h3><br><br>

            <div class="header-bottom">
                <div class="header-right w3agile">
                    <div class="header-left-bottom agileinfo">
                        <?php
					if(isset($check_login)){
                     echo $check_login;
                    }
					?>
                        <form onsubmit="showMessageBox()" method="POST" action="">
                            <form onsubmit="showMessageBox()" method="post" action="">

                                <!-- <h2 class="py-md-5" style="text-align:center">Điền thông tin đăng nhập</h2> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="hoten" class="form-label"> Username<span class="error"></span>
                                        </label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Nhập username" name="KH_USERNAME" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputNumberl4" class="form-label">Password<span class="error"
                                                name="KH_PASSWORD"></span></label>
                                        <input type="password" class="form-control" id="psw" placeholder="Nhập password"
                                            name="KH_PASSWORD" required>
                                    </div>
                                    <input type="submit" name="submit" id="login" class="btn btn-primary py-3 px-5"
                                        value="Login">
                                    <!-- <form action="" method="POST">
                            <p>Username:</p>
                            <input type="text" id="username" name="KH_USERNAME" placeholder="Nhập tên đăng nhập tại đây " />
                            <p>Password:</p>
                            <input type="password" id="psw" name="KH_PASSWORD" placeholder="Nhập mật khẩu tại đây" />
                            <input type="submit" name="submit" id="login" class="btn btn-primary py-3 px-5" value="Login">
                            <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký tại đây</a></p>
                        </form> -->
                                </div>

                            </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
<?php
@include 'inc/footer.php';
?>