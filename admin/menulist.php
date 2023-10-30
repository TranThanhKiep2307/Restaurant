<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    @include('../classes/menu.php');
?>
<?php
	$cat = new menu();

	if (isset($_GET['delid'])) {
        $id = $_GET['delid'];
		$delete_cart = $cat -> delete_menu($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách Menu</h2>
                <div class="block">
				<?php 
                if(isset($delete_cart)){
                    echo $delete_cart;
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Danh sách menu</th>
							<th>Tên Menu</th>
							<th>Giá tiền </th>
							<th>Hình ảnh</th>
							<th>Mô tả</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_menu = $cat -> show_menu();
							if($show_menu){
								$i = 0;
								while ($result = $show_menu -> fetch_assoc()){
									$i++;
					?>
							<tr class="odd gradeX">
								<td> <?php echo $i; ?></td>
								<td><?php echo $result['MN_MA'] ?></td>
								<td><?php echo $result['MN_TEN']?></td>
								<td><?php echo $result ['MN_GIA']?></td>
								<td><img src="../images/<?php echo $result ['MN_HINHANH']?>" width="80px" style="margin: 10px 10px 0px 10px; " ></td>
								<td><?php echo $result ['MN_MOTA']?></td>
								<td><a href="catedit.php?menuid=<?php echo $result['MN_MA'] ?>">Edit</a> || 
								<a onclick =  "return confirm ('Bạn có chắc muốn xóa không???')" href="?delid=<?php echo $result['MN_MA'] ?>">Delete</a></td>
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
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

