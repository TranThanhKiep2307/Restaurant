<?php
include("connect.php");

if (isset($_POST["dangky"])) {
    $username = $_SESSION["username"];
    $newPassword = $_POST["psw2"];
    $diachi = $_POST["diachi"];
    $ten = $_POST["ten"];
    $sdt = $_POST["sdt"];
    $email = $_POST["email"];

    // Sử dụng truy vấn SQL thông thường
    $sql = "UPDATE khachhang SET KH_PASSWORD = '$newPassword', KH_DIACHi = '$diachi', KH_TEN = '$ten', KH_SDT = '$sdt', KH_EMAIL = '$email' WHERE KH_USERNAME = '$username'";
    $result = $conn->query($sql);

    if ($result) {
        echo '<script language="javascript">
            alert("Đã lưu thông tin!");
            window.location.href = "index.php"; // Chuyển hướng về trang chủ
            </script>';
    } else {
        echo '<script language="javascript">
            alert("Không thể cập nhật!");
            history.back();
            </script>';
    }
}

if (isset($_POST["rsmk"])) {
    $email = $_SESSION["KH_EMAIL"];
    $currentPassword = $_POST["psw2"];
    $newPassword = $_POST["psw"];
    $confirmPassword = $_POST["psw1"];

    // Kiểm tra mật khẩu tại phía máy chủ
    $sqlCheckPassword = "SELECT KH_PASSWORD FROM khachhang WHERE KH_EMAIL= '$email'";
    $result = $conn->query($sqlCheckPassword);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedCurrentPassword = $row['KH_PASSWORD'];

        if ($currentPassword === $hashedCurrentPassword) {
            if ($newPassword == $confirmPassword) {
                $sqlUpdatePassword = "UPDATE khachhang SET KH_PASSWORD = '$newPassword' WHERE KH_EMAIL = '$email'";
                $result = $conn->query($sqlUpdatePassword);

                echo '<script language="javascript">
                    alert("Đổi mật khẩu thành công!");
                    window.location.href = "index.php"; // Chuyển hướng về trang chủ
                    </script>';
            } else {
                echo '<script language="javascript">
                    alert("Mật khẩu mới và mật khẩu xác nhận không khớp!");
                    history.back();
                    </script>';
            }
        } else {
            echo '<script language="javascript">
                alert("Mật khẩu cũ không đúng!");
                history.back();
                </script>';
        }
    } else {
        echo '<script language="javascript">
            alert("Không tìm thấy thông tin người dùng.");
            history.back();
            </script>';
    }
}

// Đóng kết nối
$conn->close();
