<?php include "inc/header.php" ?>
<?php include 'inc/sidebar.php'; ?>
<html style = "background: #69594C">
<head>
    <title>Tính Doanh Thu và Số Lượng Bàn</title>
</head>
<style>
    body {
        background: #fff;
        color: #000;
        font-size: 20px;
        padding: 0;
    }

    input[type="number"] {
        padding: 10px 20px;
        width: 100%;
    }

    form {
        display: block;
        margin-top: 0em;
    }
</style>

<body>
    <h1 style="color:#fff">Tính Doanh Thu và Số Lượng Bàn</h1>

    <form method="post" action="">
        <div class="row">
            <div class="col-6">
                <label for="ngay" class="form-label">Chọn thời điểm:<span class="error"></span> </label>
                <input type="date" class="form-control" id="ngay" name="ngay">
            </div>
        </div><br>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary py-3 px-5">Xem doanh thu</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra và gán giá trị từ form
        $ngay = isset($_POST["ngay"]) ? $_POST["ngay"] : null;
        $thang = date('m', strtotime($ngay));
        $nam = date('Y', strtotime($ngay));

        if (!empty($ngay)) {
            // Tiếp tục xử lý nếu có giá trị từ form
            $conn = new mysqli("localhost", "root", "", "restaurant");

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }

            // Sử dụng prepared statement để tránh SQL injection
            function executeQuery($conn, $sql)
            {
                $result = $conn->query($sql);

                if ($result) {
                    $row = $result->fetch_assoc();
                    return $row;
                } else {
                    return false;
                }
            }

            // Hàm tính tổng số lượng bàn đặt theo điều kiện
            function tinhTongSoLuongBan($conn, $whereClause)
            {
                $sql = "SELECT COUNT(hoadon.HD_MA) AS tong_so_luong_ban
                        FROM hoadon
                        WHERE $whereClause";

                return executeQuery($conn, $sql);
            }

            // Hàm tính tổng doanh thu theo điều kiện
            function tinhTongDoanhThu($conn, $whereClause)
            {
                $sql = "SELECT SUM(chitiethoadon.CTHD_TONGTIEN) AS tong_doanh_thu
                        FROM chitiethoadon
                        JOIN hoadon ON chitiethoadon.HD_MA = hoadon.HD_MA
                        WHERE $whereClause";

                return executeQuery($conn, $sql);
            }

            $whereClause = "DAY(hoadon.HD_NGAYLAP) = $ngay AND MONTH(hoadon.HD_NGAYLAP) = $thang AND YEAR(hoadon.HD_NGAYLAP) = $nam";
            $soLuongBanNgay = tinhTongSoLuongBan($conn, $whereClause);
            $doanhThuNgay = tinhTongDoanhThu($conn, $whereClause);

            $whereClause = "MONTH(hoadon.HD_NGAYLAP) = $thang AND YEAR(hoadon.HD_NGAYLAP) = $nam";
            $soLuongBanThang = tinhTongSoLuongBan($conn, $whereClause);
            $doanhThuThang = tinhTongDoanhThu($conn, $whereClause);

            $whereClause = "YEAR(hoadon.HD_NGAYLAP) = $nam";
            $soLuongBanNam = tinhTongSoLuongBan($conn, $whereClause);
            $doanhThuNam = tinhTongDoanhThu($conn, $whereClause);

            echo "<p>Doanh thu ngày $ngay là: " . $doanhThuNgay['tong_doanh_thu'] . " VNĐ</p>";
            echo "<p>Số lượng bàn đặt ngày $ngay là: " . $soLuongBanNgay['tong_so_luong_ban'] . " Bàn</p>";

            echo "<p>Doanh thu trong tháng $thang là: " . $doanhThuThang['tong_doanh_thu'] . " VNĐ</p>";
            echo "<p>Số lượng bàn đặt trong tháng $thang là: " . $soLuongBanThang['tong_so_luong_ban'] . " Bàn</p>";

            echo "<p>Doanh thu trong năm $nam là: " . $doanhThuNam['tong_doanh_thu'] . " VNĐ</p>";
            echo "<p>Số lượng bàn đặt trong năm $nam là: " . $soLuongBanNam['tong_so_luong_ban'] . " Bàn</p";

            $conn->close();
        }
    }
    ?>
</body>

</html>