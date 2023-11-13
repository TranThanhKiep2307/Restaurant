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
<?php
$id = Session::get('KH_MA');
$update_customers = '';
$passwordUpdateSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $update_customers = $cs->update_users($_POST, $id);

    // Kiểm tra xem form đã được submit chưa
    if (isset($_POST["submit"])) {
        // Lấy thông tin từ form
        $currentPassword = $_POST["current_password"];
        $newPassword = $_POST["new_password"];
        $confirmPassword = $_POST["confirm_password"];

        // Lấy ID người dùng từ session
        $userId = $_SESSION['KH_MA'];

        // Kiểm tra xem mật khẩu hiện tại có đúng không
        $currentPasswordQuery = "SELECT KH_PASSWORD FROM khachhang WHERE KH_MA = '$userId'";
        $currentPasswordResult = $this->db->select($currentPasswordQuery);

        if ($currentPasswordResult) {
            $hashedCurrentPassword = $currentPasswordResult[0]['KH_PASSWORD'];

            if (password_verify($currentPassword, $hashedCurrentPassword)) {
                // Mật khẩu hiện tại đúng, bạn có thể thực hiện các bước tiếp theo
                if ($newPassword == $confirmPassword) {
                    // Hash mật khẩu mới trước khi lưu vào cơ sở dữ liệu
                    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Cập nhật mật khẩu mới vào cơ sở dữ liệu
                    $updateSql = "UPDATE khachhang SET KH_PASSWORD = '$hashedNewPassword' WHERE KH_MA = $userId";
                    $updateResult = $this->db->update($updateSql);

                    if ($updateResult) {
                        $passwordUpdateSuccess = true; // Đặt biến kiểm tra thành công
                    } else {
                        echo "Có lỗi xảy ra khi cập nhật mật khẩu: " . $this->db->error();
                    }
                } else {
                    echo "Mật khẩu mới và mật khẩu xác nhận không khớp.";
                }
            } else {
                echo "Mật khẩu hiện tại không đúng.";
            }
        } else {
            echo "Không tìm thấy thông tin người dùng.";
        }
    }
}

?>


<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Change your profile</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<body class="nen">
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="container-fluid pt-1">
                <div class="row px-xl-5">
                    <div class="col-lg-12 mb-5" style="margin-top: -40px;">
                        <section class="text-again:center">
                            <div class="row">
                                <!-- <h1 class="mb-2 bread">Thay đổi thông tin người dùng</h1> -->

                                <div class="col-md-6">
                                    <form action="sua.php" style="text-align:center" method="post">
                                        <?php
                                        $id = Session::get('KH_MA');
                                        $get_customers = $us->show_users($id);
                                        if ($get_customers) {
                                            while ($result = $get_customers->fetch_assoc()) {
                                        ?>
                                        <label class="lab" for="full_name">Tên đăng nhập:</label>

                                        <input class="form-control" value="<?php echo $result['KH_USERNAME'] ?>"
                                            name="username"></input><br>

                                        <label class="lab" for="full_name">Họ tên:</label>
                                        <input type="text" class="form-control" value="<?php echo $result['KH_TEN'] ?>"
                                            name="full_name"><br>

                                        <label class="lab" for="phone">Số điện thoại:</label>
                                        <input type="text" class="form-control" value=" <?php echo $result['KH_SDT'] ?>"
                                            name="phone"><br>

                                        <label class="lab" for="email">Email:</label>
                                        <input type="email" class="form-control"
                                            value=" <?php echo $result['KH_EMAIL'] ?>" name="email"><br>

                                        <input class="btn btn-primary py-3 px-5" type="submit" value="Cập nhật">
                                        <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>

                                <div class="col-md-6">
                                <form action="changepassword.php" method="post">
                                    <label class="lab" for="current_password">Mật Khẩu Hiện Tại:</label>
                                    <input class="form-control" type="password" name="current_password" id="current_password" value="" data-password="<?php echo $result['KH_PASSWORD']; ?>" required>
                                    <span id="currentPasswordError" style="color: red;"></span>
                                    <br>

                                    <label class="lab" for="new_password">Mật Khẩu Mới:</label>
                                    <input class="form-control" type="password" name="new_password" required>
                                    <br>

                                    <label class="lab" for="confirm_password">Xác Nhận Mật Khẩu Mới:</label>
                                    <input class="form-control" type="password" name="confirm_password" required>
                                    <br>

                                </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    function validateForm() {
        var currentPasswordInput = document.getElementById("current_password");
        var currentPassword = currentPasswordInput.value;
        var correctPassword = currentPasswordInput.dataset.password;

       
        if (currentPassword === "") {
            
            document.getElementById("currentPasswordError").innerHTML = "Vui lòng nhập mật khẩu hiện tại.";
            
            return false;
        } else {
            
            document.getElementById("currentPasswordError").innerHTML = "";

            if (currentPassword !== correctPassword) {
               
                alert("Mật khẩu hiện tại không đúng. Vui lòng nhập lại.");
                
                return false;
            }

            return true;
        }
    }
</script>



</body>

<?php
include("inc/footer.php");
?>