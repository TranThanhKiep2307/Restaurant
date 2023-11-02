<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath = realpath(dirname(__FILE__));
    @include_once($filepath.'/../lib/database.php');
    @include_once($filepath.'/../helpers/format.php');
    @include('../classes/user.php');
?>
<?php
    $us = new user();
    
?>
<?php
    $db = new Database();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thông tin khách hàng</h2>
        <div class="block">               
         <form>
            <table class="data display datatable" id="example">					
            <thead>
				<tr>
                    <th>STT</th>
					<th>Mã</th>
					<th>Tên</th>
					<th>Quận Huyện</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Username</th>
					<th>Chỉnh sửa</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$uslist = $us -> show_user();
				if($uslist){
					$i = 0;
					while($result = $uslist ->fetch_assoc()){
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
                    <td><?php echo $result['KH_MA']?></td>
					<td><?php echo $result['KH_TEN']?></td>
                    <td>
                    <?php
                        $location = "SELECT quan_huyen.Q_TEN, khachhang.* 
                        FROM quan_huyen 
                        JOIN khachhang ON khachhang.Q_MA = quan_huyen.Q_MA
                        WHERE khachhang.KH_MA = '2'";
                        $result_sql = $db->select($location);
                        if ($result_sql) {
                            while ($row = $result_sql->fetch_assoc()) {
                                echo $row['Q_TEN'];
                            }
                        }
                    ?>
                    </td>
					<td><?php echo $result['KH_SDT']?></td>
					<td><?php echo $result['KH_EMAIL']?></td>
                    <td><?php echo $result['KH_DIACHI']?></td>
					<td><?php echo $result['KH_USERNAME']?></td>
					<td><a onclick =  "return confirm ('Bạn có chắc muốn xóa không???')" href="?userid=<?php echo $result['KH_MA'] ?>">Delete</a></td>
				</tr>
			<?php
				}
			}
			?>
			</tbody>	 
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>