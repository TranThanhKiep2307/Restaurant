<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/menu.php');
?>
<?php 
$cat= new menu();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$MN_TEN = $_POST['MN_TEN'];

	$insert_cart = $cat->insert_menu($MN_TEN);
  }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Menu</h2>
               <div class="block copyblock">
               <?php 
                if(isset($insert_cart)){
                    echo $insert_cart;
                }
                ?>
                 <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input menu="text" name = "MN_TEN" placeholder="Đặt tên Menu" class="medium" />
                            </td>
                        </tr>
						

                        <tr>
                            <td>
                                <label>Loại món ăn</label>
                            </td>
                            <td>
                                <select id="select" name="LTA_MA">
                                    <option>Chọn mã món</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_menu();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['LTA_MA']?>"><?php echo $result['LTA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>   
                            <tr>
                        <td>
                            <label>Món thứ nhất</label>
                        </td>
                        <td>
                        <select id="select" name="MA_TEN">
                                    <option>Chọn món thêm vào menu</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_tenmon();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['TA_TEN']?>"><?php echo $result['TA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                        </td>
                    </tr>

                        <tr>
                            <td>
                                <label>Món thứ hai</label>
                            </td>
                            <td>
                                <input type="text" name = "MN_SOLUONG" placeholder="Nhập số lượng món thứ nhất " class="medium" />
                            </td>
                        </tr>
                       


                        <tr>
                            <td>
                                <label>Loại món ăn</label>
                            </td>
                            <td>
                                <select id="select" name="LTA_MA">
                                    <option>Chọn mã món</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_menu();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['LTA_MA']?>"><?php echo $result['LTA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>   
                            <tr>
                        <td>
                            <label>Món thứ ba </label>
                        </td>
                        <td>
                        <select id="select" name="MA_TEN">
                                    <option>Chọn món thêm vào menu</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_tenmon();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['TA_TEN']?>"><?php echo $result['TA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                        </td>
                    </tr>

                        <tr>
                            <td>
                                <label>Số lượng món ăn</label>
                            </td>
                            <td>
                                <input type="text" name = "MN_SOLUONG" placeholder="Nhập số lượng món thứ 2" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Loại món ăn</label>
                            </td>
                            <td>
                                <select id="select" name="LTA_MA">
                                    <option>Món thứ tư</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_menu();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['LTA_MA']?>"><?php echo $result['LTA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>   
                            <tr>
                        <td>
                            <label>Món thứ </label>
                        </td>
                        <td>
                        <select id="select" name="MA_TEN">
                                    <option>Chọn món thêm vào menu</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_tenmon();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['TA_TEN']?>"><?php echo $result['TA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                        </td>
                    </tr>

                        <tr>
                            <td>
                                <label>Số lượng món ăn</label>
                            </td>
                            <td>
                                <input type="text" name = "MN_SOLUONG" placeholder="Nhập số lượng món ăn" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Món thứ năm</label>
                            </td>
                            <td>
                                <select id="select" name="LTA_MA">
                                    <option>Chọn mã món</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_menu();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['LTA_MA']?>"><?php echo $result['LTA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>   
                            <tr>
                        <td>
                            <label>Tên món ăn</label>
                        </td>
                        <td>
                        <select id="select" name="MA_TEN">
                                    <option>Chọn món thêm vào menu</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_tenmon();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['TA_TEN']?>"><?php echo $result['TA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                        </td>
                    </tr>

                        <tr>
                            <td>
                                <label>Số lượng món ăn</label>
                            </td>
                            <td>
                                <input type="text" name = "MN_SOLUONG" placeholder="Nhập số lượng món ăn" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Loại món ăn</label>
                            </td>
                            <td>
                                <select id="select" name="LTA_MA">
                                    <option>Chọn mã món</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_menu();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['LTA_MA']?>"><?php echo $result['LTA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>   
                            <tr>
                        <td>
                            <label>Món thứ sáu </label>
                        </td>
                        <td>
                        <select id="select" name="MA_TEN">
                                    <option>Chọn món thêm vào menu</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_tenmon();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['TA_TEN']?>"><?php echo $result['TA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                        </td>
                    </tr>

                        <tr>
                            <td>
                                <label>Số lượng món ăn</label>
                            </td>
                            <td>
                                <input type="text" name = "MN_SOLUONG" placeholder="Nhập số lượng món ăn" class="medium" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Loại món ăn</label>
                            </td>
                            <td>
                                <select id="select" name="LTA_MA">
                                    <option>Chọn mã món</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_menu();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['LTA_MA']?>"><?php echo $result['LTA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>   
                            <tr>
                        <td>
                            <label>Tên món ăn</label>
                        </td>
                        <td>
                        <select id="select" name="MA_TEN">
                                    <option>Chọn món thêm vào menu</option>
                                    <?php
                                        $cat = new menu();
                                        $catlist = $cat->show_tenmon();
                                        if($catlist){
                                            while($result = $catlist -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['TA_TEN']?>"><?php echo $result['TA_TEN']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                        </td>
                    </tr>

                        <tr>
                            <td>
                                <label>Số lượng món ăn</label>
                            </td>
                            <td>
                                <input type="text" name = "MN_SOLUONG" placeholder="Nhập số lượng món ăn" class="medium" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Thành giá</label>
                            </td>
                            <td>
                                <input type="text" name="MN_GIA" placeholder="Nhập giá của menu" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Hình ảnh Menu minh họa</label>
                            </td>
                            <td>
                                <input type="file" name="MA_HINHANH"/>
                            </td>
                        </tr>

                        <tr> 
                            <td >
                                <!-- <button class="btnfinal"  type="submit" name="submit" Value=""> Thêm</button> -->
                                <input class="btnfinal" type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>

                            </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>