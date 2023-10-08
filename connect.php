<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "restaurent";      // Khai báo database


// Hàm để kết nối database và trả về kết nối
function connectToDatabase() {
    $username = "root";
    $password = "";
    $server = "localhost";
    $dbname = "travel";
    
    // Kết nối database
    $conn = new mysqli($server, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Không kết nối: " . $conn->connect_error);
    }

    return $conn;
}

// Bắt đầu session
session_start();

// Kết nối database
$conn = connectToDatabase();

// Hàm để kiểm tra thông tin đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    if (checkLogin($conn, $user, $pass)) {
        $_SESSION["user"] = $user;
        header('Location: index.php');
    } else {
        echo "Sai username/pass";
    }
}
function checkLogin($conn, $user, $pass) {
    $sql = "SELECT KH_PASSWORD FROM khachhang WHERE KH_USERNAME = '".$user."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["KH_PASSWORD"] == $pass) {
            return true;  // Đăng nhập thành công
        } else {
            return false; // Sai mật khẩu
        }
    } else {
        return false; // Sai tài khoản
    }
}

// Đóng kết nối database

?>