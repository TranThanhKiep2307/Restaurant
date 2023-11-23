<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
@include('../classes/cart.php');
ob_start();
Session::init();

$ct = new cart();
?>
<?php
    if (isset($_GET['mapdm'])) {
        $id = $_GET['mapdm'];
        $PDM_TRANGTHAI = isset($_GET['PDM_TRANGTHAI']) ? $_GET['PDM_TRANGTHAI'] : '';
        $update = $ct->updatepdm($id, $PDM_TRANGTHAI);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách đơn hàng</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Tên món ăn</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Số lượng món ăn</th>
                        <th>Giá tiền</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Cập nhật</th>
                    </tr>
                </thead>
                <?php
                if(isset($update)){
                    echo $update;
                }
                $getpdm = $ct->getphieudatmonadmin();
                if ($getpdm) {
                    $i = 0;
                    while ($result = $getpdm->fetch_assoc()) {
                        $i++;
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['PDM_MA'] ?></td>
                                <td><?php echo $result['KH_TEN'] ?></td>
                                <td><?php echo $result['TA_TEN'] ?></td>
                                <td><?php echo $result['PDM_THOIGIAN'] ?></td>
                                <td><?php echo $result['PDM_SL'] ?></td>
                                <td><?php echo $result['PDM_GIATIEN'] ?></td>
                                <td><select id="select" name= "PDM_TINHTRANG">
                                        <option>Chọn trạng thái</option>
                                        <?php
                                        if ($result['PMN_TRANGTHAI'] == 0) {
                                        ?>
                                            <option selected value="0">Đang chờ xử lý</option>
                                            <option value="1">Đang thực hiện</option>
                                            <option value="2">Đã hoàn thành</option>
                                            <option value="3">Đang giao</option>
                                            <option value="4">Đã giao</option>
                                        <?php
                                        } elseif ($result['PMN_TRANGTHAI'] == 1) {
                                        ?>
                                            <option value="0">Đang chờ xử lý</option>
                                            <option selected value="1">Đang thực hiện</option>
                                            <option value="2">Đã hoàn thành</option>
                                            <option value="3">Đang giao</option>
                                            <option value="4">Đã giao</option>
                                        <?php
                                        } elseif ($result['PMN_TRANGTHAI'] == 2) {
                                        ?>
                                            <option value="0">Đang chờ xử lý</option>
                                            <option value="1">Đang thực hiện</option>
                                            <option selected value="2">Đã hoàn thành</option>
                                            <option value="3">Đang giao</option>
                                            <option value="4">Đã giao</option>
                                        <?php
                                        } elseif ($result['PMN_TRANGTHAI'] == 3) {
                                        ?>
                                            <option value="0">Đang chờ xử lý</option>
                                            <option value="1">Đang thực hiện</option>
                                            <option value="2">Đã hoàn thành</option>
                                            <option selected value="3">Đang giao</option>
                                            <option value="4">Đã giao</option>
                                        <?php
                                        } elseif ($result['PMN_TRANGTHAI'] == 4) {
                                        ?>
                                            <option value="0">Đang chờ xử lý</option>
                                            <option value="1">Đang thực hiện</option>
                                            <option value="2">Đã hoàn thành</option>
                                            <option value="3">Đang giao</option>
                                            <option selected value="4">Đã giao</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><a href="?mapdm=<?php echo $result['PDM_MA']?>">Lưu</a> || 
								<a onclick ="return confirm ('Bạn có chắc muốn xóa không???')" href="">Delete</a></td>
                            </tr>
                    <?php
                    }
                }
                    ?>

                        </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>