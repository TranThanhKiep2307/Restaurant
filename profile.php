<?php
$activate = "profile";
ob_start();
include("inc/header.php");
?>
<?php
$login_check = Session::get('user');
if ($login_check == false) {
    header('Location:login.php');
}
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Change your profile</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<body class="nen">
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="container-fluid pt-1">
                <div class="row px-xl-55">
                    <div class="col-lg-12 mb-5" style="margin-top: -40px;">
                        <section class="ftco-section contact-section">
                            <div class="row">
                                <!-- <h1 class="mb-2 bread">Thay đổi thông tin người dùng</h1> -->

                                <div class="col-md-62">
                                    <form action="sua.php" style="text-align:center" method="post">
                                        <?php
                                        $id = Session::get('KH_MA');
                                        $get_customers = $us->show_users($id);
                                        if ($get_customers) {
                                            while ($result = $get_customers->fetch_assoc()) {
                                        ?>
                                                <label class="lab" for="full_name">Tên đăng nhập:</label>

                                                <input class="form-controll" value="<?php echo $result['KH_USERNAME'] ?>" name="username"></input><br>

                                                <label class="lab" for="full_name">Họ tên:</label>
                                                <input type="text" class="form-controll" value="<?php echo $result['KH_TEN'] ?>" name="full_name"><br>

                                                <label class="lab" for="phone">Số điện thoại:</label>
                                                <input type="text" class="form-controll" value=" <?php echo $result['KH_SDT'] ?>" name="phone"><br>

                                                <label class="lab" for="email">Địa chỉ:</label>
                                                <input type="text" class="form-controll" value=" <?php echo $result['KH_DIACHI'] ?>" name="diachi"><br>

                                                <input class="btn btn-primary2 py-3 px-5" type="submit" value="Cập nhật">
                                        <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>

                                <div class="col-md-62">
                                    <form action="doimk.php" method="post">
                                        <?php
                                        $id = Session::get('KH_MA');
                                        $get_customers = $us->show_users($id);
                                        if ($get_customers) {
                                            while ($result = $get_customers->fetch_assoc()) {
                                        ?>
                                                <label class="lab" for="full_name">Email:</label>

                                                <input class="form-controll" value="<?php echo $result['KH_EMAIL'] ?>" name="KH_EMAIL"></input><br>
                                                <label class="lab" for="current_password">Mật Khẩu Hiện Tại:</label>
                                                <input class="form-controll" type="password" name="psw2" id="current_password" value="<?php echo $result['KH_PASSWORD'] ?>" data-password="<?php echo $result['KH_PASSWORD']; ?>" required>
                                                <span id="currentPasswordError" style="color: red;"></span>
                                        

                                                <label class="lab" for="new_password">Mật Khẩu Mới:</label>
                                                <input class="form-controll" type="password" name="psw" required>
                                             

                                                <label class="lab" for="confirm_password">Xác Nhận Mật Khẩu Mới:</label>
                                                <input class="form-controll" type="password" name="psw1" required>
                                           
                                                <input class="btn btn-primary2 py-3 px-5" name="rsmk" type="submit" value="Đổi mật khẩu">
                                        <?php }
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

</body>

<?php
include("inc/footer.php");
?>