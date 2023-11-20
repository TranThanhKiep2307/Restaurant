<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/menu.php');
?>
<?php 
    $menu = new menu();

    if (!isset($_GET['menuid']) || $_GET['menuid'] == NULL) {
        echo "<script>window.location = 'menulist.php'</script>";
    } else {
        $id = $_GET['menuid'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {
        $update_menu = $menu->update_menu($_POST,$_FILES,$id);
    }
   
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa menu</h2>
               <div class="copyblock">
               <?php 
                if(isset($update_menu)){
                    echo $update_menu;
                }
                ?>
                <?php
                    $get_menu_byid = $menu -> getmenubyId($id);
                        if($get_menu_byid){
                            while($result = $get_menu_byid -> fetch_assoc()){   
                    ?>
                 <form action="" method="POST"  enctype="multipart/form-data" >
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Tên menu</label>
                            </td>
                            <td>
                                <input menu="text" name = "MN_TEN" value="<?php echo $result['MN_TEN']?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giá tiền</label>
                            </td>
                            <td>
                                <input type="text" name= "MN_GIA"  value="<?php echo $result['MN_GIA']?>" class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Mô tả</label>
                            </td>
                            <td>
                                <textarea name="MN_MOTA" class="tinymce" <?php echo $result['MN_MOTA']?>></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Hình ảnh Menu</label>
                            </td>
                            <td>
                                <img src="../images/<?php echo $result['MN_HINHANH']?>" width="70px"><br>
                                <input type="file" name="MN_HINHANH"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Trạng thái menu</label>
                            </td>
                            <td>
                                <select id="select" name="MN_TINHTRANG">
                                    <option>Chọn trạng thái</option>
                                    <?php
                                        if($result['MN_TRANGTHAI']==0){
                                    ?>
                                        <option selected value="0">Còn món</option>
                                        <option value="1">Hết món</option>
                                    <?php
                                        }else{
                                    ?> 
                                        <option value="0">Còn món</option>
                                        <option selected value="1">Hết món</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" class="btn" name="submit" Value="Sửa món ăn" />
                            </td>
                        </tr>

                        </table>
                        <?php
                        }}
                        ?>
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