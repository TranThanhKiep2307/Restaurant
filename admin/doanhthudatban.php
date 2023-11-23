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
    <h1 style="color:#fff">Tính Doanh Thu Đặt Bàn</h1>';

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

        // Hàm tính tổng số lượng Bàn đặt theo điều kiện
        function tinhTongSoLuongBan($conn, $whereClause)
        {
            $sql = "SELECT COUNT(phieudathang.PDH_MA) AS tong_so_luong_ban
                    FROM phieudathang
                    WHERE $whereClause";

            $result = executeQuery($conn, $sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['tong_so_luong_ban'];
            } else {
                return 0;
            }
        }

        // Hàm tính tổng khách hàng đặt bàn theo điều kiện


        $thang = date('m', strtotime($ngay));
        $nam = date('Y', strtotime($ngay));

        $whereClauseNgay = "DATE(phieudathang.PDH_NGAYLAP) = '$ngay'";
        $soLuongBanNgay = tinhTongSoLuongBan($conn, $whereClauseNgay);

        $whereClauseThang = "MONTH(phieudathang.PDH_NGAYLAP) = '$thang' AND YEAR(phieudathang.PDH_NGAYLAP) = '$nam'";
        $soLuongBanThang = tinhTongSoLuongBan($conn, $whereClauseThang);

        $whereClauseNam = "YEAR(phieudathang.PDH_NGAYLAP) = '$nam'";
        $soLuongBanNam = tinhTongSoLuongBan($conn, $whereClauseNam);

        echo "--------------------------------------------------------------------------------------";
        echo "<p>Số lượng Bàn đặt ngày $ngay là: " . $soLuongBanNgay . " Bàn</p>";
        echo "<p>Số lượng Bàn đặt trong tháng $thang là: " . $soLuongBanThang . " Bàn</p>";
        echo "<p>Số lượng Bàn đặt trong năm $nam là: " . $soLuongBanNam . " Bàn</p>";

        // Đóng kết nối cơ sở dữ liệu
        $conn->close();
    }
}
