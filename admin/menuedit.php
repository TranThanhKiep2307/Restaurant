<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/menu.php');
?>
<?php 
    $menu = new menu();

    if (!isset($_GET['menuid']) || $_GET['menuid'] == NULL) {
        echo "<script>window.location = 'catlist.php'</script>";
    } else {
        $id = $_GET['menuid'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {
        $MN_TEN= $_POST['MN_TEN'];
        // $update_menu = $menu->update_menu($MN_TEN,$id);
        $update_menu = $menu->update_menu($_POST,$_FILES,$id);
    }
   
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa menu</h2>
               <div class="block copyblock">
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
                 
                 
                 <form action="" method="post" enctype="multipart/form-data" >
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Tiêu đề</label>
                            </td>
                            <td>
                                <input type="text" value= "<?php echo $result['MN_TEN'] ?>" name = "MN_TEN" placeholder="Sửa tên menu" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Mã món ăn</label>
                            </td>
                            <td>
                            <select id="select" name="TA_MA">
                            <option>Chọn mã loại</option>
                            <?php
                                $cat = new menu();
                                $catlist = $cat->show_tenmon();
                                if($catlist){
                                    while($result = $catlist -> fetch_assoc()){
                            ?>
                            <option 
                            <?php if($result['TA_MA']==$result['TA_MA']) { echo 'selected'; }?>
                                value="<?php echo $result['TA_MA']?>"><?php echo $result['TA_TEN']?></option>
                            <?php
                                }
                                }
                        }
                            ?>
                        </select>
                            </td>
                        </tr> 

                        <tr>
                            <td>
                                <label>Giá tiền </label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['MN_GIA']?>" name="MN_GIA" class="medium" />
                            </td>
                        </tr>
                        <tr>
                                <td>
                                    <label>Hình ảnh menu</label>
                                </td>
                                <td>
                                    <img src="../images/ <?php echo $result_review['MN_HINHANH']?>" width="80px"><br>
                                    <input type="file" name="MN_HINHANH"/>
                                </td>
                            </tr>
                        <tr>
                            <td>
                                <label>Mô tả </label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['MN_MOTA']?>" name="MN_MOTA" class="medium" />
                            </td>
                        </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                <?php
                  }
            
                ?>
                    </form>
             
                </div>
            </div>
        </div>

<?php include 'inc/footer.php';?>