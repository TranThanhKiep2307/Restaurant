<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
@include('../classes/cart.php');
@include_once($filepath . '/../lib/database.php');
ob_start();
$ct = new cart();
$db = new Database();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['mapdm']) && isset($_POST['PDM_TRANGTHAI'])) {
        $id = $_POST['mapdm'];
        $PDM_TRANGTHAI = $_POST['PDM_TRANGTHAI'];
        $sql = "UPDATE phieudatmon SET PDM_TRANGTHAI = '$PDM_TRANGTHAI' WHERE PDM_MA = '$id'";
        $result = $db->update($sql);
        if ($result) {
            $thbao = "<span class='success'>Cập nhật trạng thái thành công</span>";
        } else {
            $thbao = "<span class='error'>Cập nhật trạng thái thất bại</span>";
        }
    }
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
                
                <tbody>
                <?php
                $getpdm = $ct->getphieudatmonadmin();
                if ($getpdm) {
                    $i = 0;
                    while ($result = $getpdm->fetch_assoc()) {
                        $i++;
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['PDM_MA'] ?></td>
                        <td><?php echo $result['KH_TEN'] ?></td>
                        <td><?php echo $result['TA_TEN'] ?></td>
                        <td><?php echo $result['PDM_THOIGIAN'] ?></td>
                        <td><?php echo $result['PDM_SL'] ?></td>
                        <td><?php echo $result['PDM_GIATIEN'] ?></td>
                        <td>
                            <form action="" method="POST">
                            <input type="hidden" name="mapdm" value="<?php echo $result['PDM_MA']; ?>">
                            <select id="select" name="PDM_TRANGTHAI">
                                <option value="0" <?php echo ($result['PDM_TRANGTHAI'] == 0) ? 'selected' : ''; ?>>Đang chờ xử lý</option>
                                <option value="1" <?php echo ($result['PDM_TRANGTHAI'] == 1) ? 'selected' : ''; ?>>Đang thực hiện</option>
                                <option value="2" <?php echo ($result['PDM_TRANGTHAI'] == 2) ? 'selected' : ''; ?>>Đã hoàn thành</option>
                                <option value="3" <?php echo ($result['PDM_TRANGTHAI'] == 3) ? 'selected' : ''; ?>>Đang giao</option>
                                <option value="4" <?php echo ($result['PDM_TRANGTHAI'] == 4) ? 'selected' : ''; ?>>Đã giao</option>
                            </select>
                            <td><input type="submit" name="submit" value="Lưu"></td>
                            </form>
                        </td>
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