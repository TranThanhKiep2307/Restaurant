<?php
ob_start();
$activate = "orderfood";
@include('inc/header.php');
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Order History</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Your old order <i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        color: #000;
    }
    th{
        border: 1px solid #000;
    }
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #fff;
    }

    tr:hover {background-color: #c8a97e;}
</style>

<body class="nen">
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="container-fluid pt-1">
                <div class="row px-xl-55">
                    <div class="col-lg-12 mb-5" style="margin-top: -40px;">
                        <section class="ftco-section contact-section">
                            <h2>Your old order</h2>

                            <table>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên món ăn</th>
                                        <th>Thời gian đặt hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Tổng số lượng món ăn</th>
                                        <th>Tổng giá tiền</th>
                                    </tr>
                                </thead>
                                <?php
                                $id = Session::get('KH_MA');
                                $getphieudatmon = $ct->getphieudatmon($id);
                                $totalQuantity = 0;
                                $totalPrice = 0;
                                if ($getphieudatmon) {
                                    $i = 0;
                                    while ($result = $getphieudatmon->fetch_assoc()) {
                                        $i++;
                                        $totalQuantity += $result['PDM_SL'];
                                        $totalPrice += $result['PDM_GIATIEN'];
                                ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['TA_TEN'] ?></td>
                                                <td><?php echo $result['PDM_THOIGIAN'] ?></td>
                                                <td><?php
                                                    if ($result['PDM_TRANGTHAI'] == 0) {
                                                        echo "Đang chờ xử lý";
                                                    } elseif ($result['PDM_TRANGTHAI'] == 1) {
                                                        echo "Đang giao";
                                                    } elseif ($result['PDM_TRANGTHAI'] == 2) {
                                                        echo "Đã hoàn thành";
                                                    }
                                                    ?></td>
                                                <td><?php echo $result['PDM_SL'] ?></td>
                                                <td><?php echo $result['PDM_GIATIEN'] ?></td>
                                            </tr>
                                    <?php
                                    }
                                }
                                    ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">Tổng cộng:</td>
                                                <td><?php echo $totalQuantity; ?></td>
                                                <td><?php echo $totalPrice; ?></td>
                                            </tr>
                                        </tfoot>
                            </table>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<?php
@include('inc/footer.php');
?>