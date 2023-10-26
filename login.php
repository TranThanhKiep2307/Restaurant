<?php
$activate = "login";
ob_start();
@include 'inc/header.php';
?>

<head>
    <title>ĐĂNG NHẬP</title>
<?php
   $login_check = Session::get('user'); 
   if($login_check){ 
      header('Location:index.php'); 
   }	
?>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $login_user = $us->login_user($_POST);
    }   
?>

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
            <?php
					if(isset($login_user)){
                     echo $login_user;
                  }
					?>
            <div class="header-bottom">
                <div class="header-right w3agile">
                    <div class="header-left-bottom agileinfo">
                        <form action="index.php" method="POST">
                            <p>Username:</p>
                            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập tại đây " />
                            <p>Password:</p>
                            <input type="password" id="psw" name="psw" placeholder="Nhập mật khẩu tại đây" />
                            <input type="submit" name="submit" id="login" value="Login">
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
// $user = new user();

// Hàm để kiểm tra thông tin đăng nhập
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username   = $_POST["username"];
//     $psw        = $_POST["psw"];
//     $login_check = $user->login_user($CTV_username,$psw);
//     // if (Login_users($result)) {
//     //     $_SESSION["username"] = $username;
        
//     //     // header('Location: index.php');
//     // } else {
//     //     echo "Sai username/pass";
//     // }
// }
// function checkLogin($conn, $username, $psw) {
//     $sql = "SELECT KH_PASSWORD FROM khachhang WHERE KH_USERNAME = '".$username."'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         if ($row["KH_PASSWORD"] == $psw) {
//             return true;  // Đăng nhập thành công
//         } else {
//             echo "Sai password";
//             return false; // Sai mật khẩu
//         }
//     } else {
//         echo "Sai username";
//         return false; // Sai tài khoản
//     }
// }

// Đóng kết nối database
@include 'inc/footer.php';
?>