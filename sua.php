<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Nhận dữ liệu từ biểu mẫu
$username = $_POST['username'];
$new_full_name = $_POST['full_name']; // Dữ liệu mới tên của khách hàng
$new_phone = $_POST['phone']; // Dữ liệu mới số điện thoại của khách hàng
$new_diachi = $_POST['diachi']; // Dữ liệu mới email của khách hàng


// Cập nhật thông tin người dùng trong CSDL
$sql = "UPDATE khachhang 
        SET KH_TEN='$new_full_name', KH_SDT='$new_phone', KH_DIACHI='$new_diachi' 
        WHERE KH_USERNAME='$username'";

if ($conn->query($sql) === TRUE) {
    echo '<script>
        alert("Thông tin khách hàng đã được cập nhật thành công. ");
        location="index.php";</script>';
    // echo "";
    // header ('Location : index.php');
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
