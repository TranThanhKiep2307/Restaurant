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
                        <form action="connect.php" method="post">
                            <p>Username:</p>
                            <input type="text" id="user" name="user" placeholder="Nhập tên đăng nhập tại đây " />
                            <p>Password:</p>
                            <input type="password" id="pass" name="pass" placeholder="Nhập mật khẩu tại đây" />
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
@include 'inc/footer.php';
?>