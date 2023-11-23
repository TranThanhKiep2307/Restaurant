<?php
include "inc/header.php";
include 'inc/sidebar.php';

echo '<html style="background: #69594C">';

echo '<head>
    <title>Tính Doanh Thu và Số Lượng Món</title>
</head>';

echo '<style>
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
</style>';

echo '<body>
    <h1 style="color:#fff">Tính Doanh Thu và Số Lượng Món</h1>';

echo '<form method="post" action="">
        <div class="row">
            <div class="col-6">
                <label for="ngay" class="form-label">Chọn thời điểm:<span class="error"></span> </label>
                <input type="date" class="form-control" id="ngay" name="ngay">
            </div>
        </div><br>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary py-3 px-5">Xem doanh thu</button>
        </div>
    </form>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra và gán giá trị từ form
    $ngay = isset($_POST["ngay"]) ? $_POST["ngay"] : null;

    if (!empty($ngay)) {
        // Tiếp tục xử lý nếu có giá trị từ form
        $conn = new mysqli("localhost", "root", "", "restaurant");

        // Kiểm tra kết nối cơ sở dữ liệu
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        // Sử dụng prepared statement để tránh SQL injection
        function executeQuery($conn, $sql)
        {
            $result = $conn->query($sql);

            if ($result === false) {
                die("Lỗi truy vấn: " . $conn->error);
            }

            return $result;
        }

        // Hàm tính tổng số lượng Món đặt theo điều kiện
        function tinhTongSoLuongMon($conn, $whereClause)
        {
            $sql = "SELECT COUNT(phieudatmon.PDM_MA) AS tong_so_luong_mon
                    FROM phieudatmon
                    WHERE $whereClause";

            $result = executeQuery($conn, $sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['tong_so_luong_mon'];
            } else {
                return 0;
            }
        }

        // Hàm tính tổng doanh thu theo điều kiện
        function tinhTongDoanhThu($conn, $whereClause)
        {
            $sql = "SELECT SUM(phieudatmon.PDM_GIATIEN) AS tong_doanh_thu
                    FROM phieudatmon
                    WHERE $whereClause";

            $result = executeQuery($conn, $sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['tong_doanh_thu'];
            } else {
                return 0;
            }
        }

        $thang = date('m', strtotime($ngay));
        $nam = date('Y', strtotime($ngay));

        $whereClauseNgay = "DATE(phieudatmon.PDM_THOIGIAN) = '$ngay'";
        $soLuongMonNgay = tinhTongSoLuongMon($conn, $whereClauseNgay);
        $doanhThuNgay = tinhTongDoanhThu($conn, $whereClauseNgay);

        $whereClauseThang = "MONTH(phieudatmon.PDM_THOIGIAN) = '$thang' AND YEAR(phieudatmon.PDM_THOIGIAN) = '$nam'";
        $soLuongMonThang = tinhTongSoLuongMon($conn, $whereClauseThang);
        $doanhThuThang = tinhTongDoanhThu($conn, $whereClauseThang);

        $whereClauseNam = "YEAR(phieudatmon.PDM_THOIGIAN) = '$nam'";
        $soLuongMonNam = tinhTongSoLuongMon($conn, $whereClauseNam);
        $doanhThuNam = tinhTongDoanhThu($conn, $whereClauseNam);

        // Hiển thị thông tin
        "<br>";
        echo "--------------------------------------------------------------------------------------";

        echo "<p>Doanh thu ngày $ngay là: " . number_format($doanhThuNgay, 0, ',', '.') . " VNĐ</p>";

        echo "<p>Doanh thu trong tháng $thang là: " . number_format($doanhThuThang, 0, ',', '.') . " VNĐ</p>";

        echo "<p>Doanh thu trong năm $nam là: " . number_format($doanhThuNam, 0, ',', '.') . " VNĐ</p>";

        echo "--------------------------------------------------------------------------------------";

        echo "<p>Số lượng Món đặt ngày $ngay là: " . $soLuongMonNgay . " Món</p>";

        echo "<p>Số lượng Món đặt trong tháng $thang là: " . $soLuongMonThang . " Món</p>";

        echo "<p>Số lượng Món đặt trong năm $nam là: " . $soLuongMonNam . " Món</p>";

        // Đóng kết nối cơ sở dữ liệu
        $conn->close();
    }
}

echo '</body>';
echo '</html>';
