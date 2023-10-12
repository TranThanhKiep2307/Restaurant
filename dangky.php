
<head>
    <title>ĐĂNG NHẬP</title>


    <link href="./css/login.css" rel="stylesheet" type="text/css" media="all" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<?php
    
		require_once("connect.php");
		if (isset($_POST["dangky"])) {
  			//lấy thông tin từ các form bằng phương thức POST
              $ten = $_POST["ten"];
              $email = $_POST["email"];
              $usernam = $_POST["usernam"];
              $password = $_POST["psw"];
              $sdt = $_POST["sdt"];
              $diachi = $_POST["diachi"];
              $qh_ma = $_POST["qh"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($usernam == "" || $password == "" ) {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
                      $sql = "SELECT KH_PASSWORD FROM khachhang WHERE KH_USERNAM = '".$usernam."'";
					    $kt=mysqli_query($conn, $sql);
					        if(mysqli_num_rows($kt)  > 0){
						        echo "Tài khoản đã tồn tại";
					        }else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO khachhang(Q_MA,KH_TEN,KH_SDT,KH_EMAIL,KH_DIACHI,KH_USERNAM,KH_PASSWORD )VALUES ($qh_ma,'$ten','$sdt','$email','$diachi','$usernam','$password')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
                        if (mysqli_query($conn, $sql)) {
                            echo "Chúc mừng bạn đã đăng ký thành công.";
                            header('Location: login.php');
                            exit();
                        } else {
                            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
					}
									    
					
			  }
	}
	?>
    <form method="post" action="dangky.php">

        <h2>Đăng ký thành viên</h2>
        <div class="col-6">
            <label for="inputAddress" class="form-label">Họ và tên<span class="error"></span> </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Nhập tên của bạn" name="ten">
        </div>

        <div class="col-md-6">
            <label for="inputNumberl4" class="form-label">Số điện thoại<span class="error"></span></label>
            <input type="text" class="form-control" id="sdt" name="sdt">
        </div>

        <div class="col-md-6">
            <label for="inputNumberl4" class="form-label">Tên đăng nhập<span class="error">*                                           </span></label>
            <input type="text" class="form-control" id="usernam" name="usernam">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Email<span class="error">*</span> </label>
            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn" name="email">
        </div>
        <div class="col-md-6">
            <label for="inputNumberl4" class="form-label">Địa chỉ<span class="error">                                          </span></label>
            <input type="text" class="form-control" id="diachi" name="diachi">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Mật khẩu<span class="error">*</span></label>
            <input type="password" class="form-control" id="matkhau" name="psw">
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Nhập lại mật khẩu<span class="error">*</span></label>
            <input type="password" class="form-control" id="matkhau2" name="psw1">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Quận Huyện<span class="error">*</span></label>
            <select class="form-select form-control" id="qh" name="qh">
                <option value="" selected>Chọn quận/huyện</option>
            <?php
                                            
                                            // Truy vấn để lấy danh sách quận/huyện
                $sql = "SELECT Q_MA, Q_TEN FROM quan_huyen";
                 $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["Q_MA"] . '">' . $row["Q_TEN"] . '</option>';
                            }
                        }

                                            // Đóng kết nối đến cơ sở dữ liệu
                            $conn->close();
                ?>
            </select>
        </div>
        <div class="col-md-12">      
            <button type="submit" class="mt-2 btn btn-success"  name="dangky">Đăng ký </button>
        </div>

    </form>

</body>


<?php
@include('inc/footer.php');
?>