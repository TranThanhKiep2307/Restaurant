<?php
$activate = "login";
@include 'inc/header.php';
?>

<head>
    <title>ĐĂNG NHẬP</title>


    <link href="./css/login.css" rel="stylesheet" type="text/css" media="all" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
    <!--header start here-->
    
    <div class="header">
        <div class="header-main">
            <br><br>
            <h3>ĐĂNG NHẬP</h3><br><br>
            <div class="header-bottom">
                <div class="header-right w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form action="index.php" method="post">
                            <p>Username:</p>
                            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập tại đây " />
                            <p>Password:</p>
                            <input type="password" id="psw" name="psw" placeholder="Nhập mật khẩu tại đây" />
                            <input type="submit" id="login" value="Login">
                            <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký tại đây</a></p>
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
    </div>
   
</body>

<?php
// Kết nối database
$conn = connectToDatabase();


// Hàm để kiểm tra thông tin đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $psw = $_POST["psw"];

    if (checkLogin($conn, $username, $pass)) {
        $_SESSION["username"] = $username;
        header('Location: index.php');
    } else {
        echo "Sai username/pass";
    }
}
function checkLogin($conn, $username, $psw) {
    $sql = "SELECT KH_PASSWORD FROM khachhang WHERE KH_USERNAM = '".$username."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["KH_PASSWORD"] == $psw) {
            return true;  // Đăng nhập thành công
        } else {
            return false; // Sai mật khẩu
        }
    } else {
        return false; // Sai tài khoản
    }
}

// Đóng kết nối database
@include 'inc/footer.php';
?>