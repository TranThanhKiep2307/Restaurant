<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "restaurant";      // Khai báo database


// Hàm để kết nối database và trả về kết nối
function connectToDatabase() {
    $username = "root";
    $password = "";
    $server = "localhost";
    $dbname = "restaurant";
    
    // Kết nối database
    $conn = new mysqli($server, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Không kết nối: " . $conn->connect_error);
    }

    return $conn;
}

// Bắt đầu session
// session_start();
$conn = connectToDatabase();


?>