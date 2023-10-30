<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/menu.php');
?>
<?php 
    $mn = new menu();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $insert_menu = $mn->insert_menu($_POST,$_FILES);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Menu</h2>
               <div class="block copyblock">
               <?php 
                if(isset($insert_menu)){
                    echo $insert_menu;
                }
                ?>
                 <form action="addmenu.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Tên menu</label>
                            </td>
                            <td>
                                <input menu="text" name = "MN_TEN" placeholder="Đặt tên Menu" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giá tiền</label>
                            </td>
                            <td>
                                <input type="text" name= "MN_GIA" placeholder="Nhập giá của menu" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Hình ảnh Menu</label>
                            </td>
                            <td>
                                <input type="file" name="MA_HINHANH"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Mô tả</label>
                            </td>
                            <td>
                                <textarea name="MN_MOTA" class="tinymce"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Trạng thái menu</label>
                            </td>
                            <td>
                                <select id="select" name="MN_TINHTRANG">
                                    <option>Chọn trạng thái</option>
                                    <option value="0">Còn món </option>
                                    <option value="1">Hết món</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input class="btnfinal" type="submit" name="submit" Value="Thêm món ăn" />
                            </td>
                        </tr>

                        </table>
                    </form>
                </div>
            </div>
        </div>

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>

<?php include 'inc/footer.php';?>