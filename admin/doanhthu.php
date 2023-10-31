<?php include "inc/header.php" ?>
<?php include 'inc/sidebar.php';?>

<head>
    <title>Tính Doanh Thu</title>
</head>
<!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #bcbaba;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            background-color: #69594C;
            color: #fff;
            padding: 10px;
            margin-top: 30px;
        }
        form {
            text-align: center;
            margin-top: 80px;
        }
        label, input {
            display: block;
            margin: 10px auto; /* Điều này căn giữa input */
            text-align: center; /* Điều này căn giữa nội dung trong input */
            color:#fff;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        p {
            text-align: center;
            margin: 20px;
            font-size: 18px;
        }
    </style> -->
<body>
    <h1>Tính Doanh Thu</h1>

    <form method="post" action="">
        <label for="ngay">Chọn ngày:</label>
        <input  type="number" name="ngay" id="ngay" min="1" max="31">

        <label for="thang">Chọn tháng:</label>
        <input type="number" name="thang" id="thang" min="1" max="12">

        <label for="nam">Chọn năm:</label>
        <input type="number" name="nam" id="nam" min="1900">

        <input type="submit" value="Tính Doanh Thu">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ngay = $_POST["ngay"];
        $thang = $_POST["thang"];
        $nam = $_POST["nam"];
    
        if (!empty($ngay) && !empty($thang) && !empty($nam)) {
            $conn = new mysqli("localhost", "root", "", "restaurant");
    
            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }
    
            // Tính tổng doanh thu theo ngày
            function tinhTongDoanhThuTheoNgay($conn, $ngay, $thang, $nam) {
                $sql = "SELECT 
                            SUM(chitiethoadon.CTHD_TONGTIEN) AS tong_doanh_thu
                        FROM 
                            chitiethoadon
                        JOIN 
                            hoadon ON chitiethoadon.HD_MA = hoadon.HD_MA
                        WHERE 
                            DAY(hoadon.HD_NGAYLAP) = $ngay
                            AND MONTH(hoadon.HD_NGAYLAP) = $thang
                            AND YEAR(hoadon.HD_NGAYLAP) = $nam";
    
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row["tong_doanh_thu"];
                } else {
                    return 0;
                }
            }
    
            // Tính tổng doanh thu theo tháng
            function tinhTongDoanhThuTheoThang($conn, $thang, $nam) {
                $sql = "SELECT 
                            SUM(chitiethoadon.CTHD_TONGTIEN) AS tong_doanh_thu
                        FROM 
                            chitiethoadon
                        JOIN 
                            hoadon ON chitiethoadon.HD_MA = hoadon.HD_MA
                        WHERE 
                            MONTH(hoadon.HD_NGAYLAP) = $thang
                            AND YEAR(hoadon.HD_NGAYLAP) = $nam";
    
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row["tong_doanh_thu"];
                } else {
                    return 0;
                }
            }
    
            // Tính tổng doanh thu theo năm
            function tinhTongDoanhThuTheoNam($conn, $nam) {
                $sql = "SELECT 
                            SUM(chitiethoadon.CTHD_TONGTIEN) AS tong_doanh_thu
                        FROM 
                            chitiethoadon
                        JOIN 
                            hoadon ON chitiethoadon.HD_MA = hoadon.HD_MA
                        WHERE 
                            YEAR(hoadon.HD_NGAYLAP) = $nam";
    
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row["tong_doanh_thu"];
                } else {
                    return 0;
                }
            }
    
            $doanhThuNgay = tinhTongDoanhThuTheoNgay($conn, $ngay, $thang, $nam);
            $doanhThuThang = tinhTongDoanhThuTheoThang($conn, $thang, $nam);
            $doanhThuNam = tinhTongDoanhThuTheoNam($conn, $nam);
    
            echo "<p>Doanh thu ngày $ngay/$thang/$nam là: $doanhThuNgay VNĐ</p>";
            echo "<p>Doanh thu trong tháng $thang/$nam là: $doanhThuThang VNĐ</p>";
            echo "<p>Doanh thu trong năm $nam là: $doanhThuNam VNĐ</p>";
    
            $conn->close();
        }
    }
    ?>