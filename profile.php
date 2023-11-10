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
if (
    $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])
) {
    $update_customers = $cs->update_customers($_POST, $id);
}
?>

<head>
    <title>Thay đổi thông tin người dùng</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body class="nen">
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="container-fluid pt-1">
                <div class="row px-xl-5">
                    <div class="col-lg-12 mb-5" style="margin-top: -40px;">
                        <section class="text-again:center">
                            <div class="row">
                                <h1>Thay đổi thông tin người dùng</h1>

                                <div class="col-6">
                                    <form action="sua.php" class="" method="post">
                                        <?php
                                        $id = Session::get('KH_MA');
                                        $get_customers = $us->show_users($id);
                                        if ($get_customers) {
                                            while ($result = $get_customers->fetch_assoc()) {
                                        ?>
                                        <label class="lab" for="full_name">Tên đăng nhập:</label>

                                        <input class="form-contro" value="<?php echo $result['KH_USERNAME'] ?>"
                                            name="username"></input><br>

                                        <label class="lab" for="full_name">Họ tên:</label>
                                        <input type="text" class="form-contro" value="<?php echo $result['KH_TEN'] ?>"
                                            name="full_name"><br>

                                        <label for="phone">Số điện thoại:</label>
                                        <input type="text" class="form-contro" value=" <?php echo $result['KH_SDT'] ?>"
                                            name="phone"><br>

                                        <label class="lab" for="email">Email:</label>
                                        <input type="email" class="form-contro"
                                            value=" <?php echo $result['KH_EMAIL'] ?>" name="email"><br>

                                        <input class="cen" type="submit" value="Cập nhật">
                                        <?php
                                            }
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