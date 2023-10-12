<?php
$activate = "reservation";
@include('inc/header.php');
?>


<head>
    <title>ĐĂNG KY</title>


    <link href="./css/login.css" rel="stylesheet" type="text/css" media="all" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
    <?php
		
		if (isset($_POST["dangky"])) {
  			//lấy thông tin từ các form bằng phương thức POST
              $ten = $_POST["ten"];
              $email = $_POST["email"];
              $username = $_POST["username"];
              $password = $_POST["psw"];
              $sdt = $_POST["sdt"];
              $diachi = $_POST["diachi"];
              $qh_ma = $_POST["qh"];
              
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" ) {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			    }
            else
                {
  					// Kiểm tra tài khoản đã tồn tại chưa
                      $sql = "SELECT KH_PASSWORD FROM khachhang WHERE KH_USERNAME = '".$username."'";
					    $kt=mysqli_query($conn, $sql);
					        if(mysqli_num_rows($kt)  > 0){
						        echo "Tài khoản đã tồn tại";
					        }else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO khachhang(Q_MA,KH_TEN,KH_SDT,KH_EMAIL,KH_DIACHI,KH_USERNAME,KH_PASSWORD )
                                VALUES ('$qh_ma','$ten','$sdt','$email','$diachi','$username','$password')";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
                        if (mysqli_query($conn, $sql)) {
                            echo "Chúc mừng bạn đã đăng ký thành công.";
                            header("Location:index.php");
                            exit();
                        } else {
                            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
					}
									    
					
			  }
	    }
	?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">REGISTER</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
<div class="dangki">
    <form onsubmit="showMessageBox()" method="post" action="dangky.php">

    <h2 class="py-md-5" style="text-align:center">Điền thông tin đăng kí</h2>
      <div class="row"> 
        <div class="col-6">
            <label for="hoten" class="form-label">Họ và tên<span class="error"></span> </label>
            <input type="text" class="form-control" id="hoten" placeholder="Nhập tên của bạn" name="ten" required>
        </div>

        <div class="col-md-6">
            <label for="inputNumberl4" class="form-label">Số điện thoại<span class="error" ></span></label>
            <input type="text" class="form-control" id="sdt" name="sdt" required>
        </div>

        <div class="col-md-6">
            <label for="username" class="form-label">Tên đăng nhập<span class="error">*                                           </span></label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="col-6">
            <label for="email" class="form-label">Email<span class="error">*</span> </label>
            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn" name="email" required>
        </div>
        
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Mật khẩu<span class="error">*</span></label>
            <input type="password" class="form-control" id="matkhau" name="psw" required>
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Nhập lại mật khẩu<span class="error">*</span></label>
            <input type="password" class="form-control" id="matkhau2" name="psw1" required>
        </div>

        <div class="col-md-6">
            <label for="inputNumberl4" class="form-label">Địa chỉ<span class="error">                                          </span></label>
            <input type="text" class="form-control" id="diachi" name="diachi" required>
        </div>
        <div class="col-md-6">
            <label for="qh" class="form-label">Quận Huyện<span class="error">*</span></label>
            <select class="form-select form-control" id="qh" name="qh" required>
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
            <button onsubmit="showMessageBox()" type="submit"  class="btn btn-primary py-3 px-5"  name="dangky">Đăng ký</button>
        </div>
    </div>
 </form>
</div>

<script>
				 function showMessageBox() {
    			var message = "Reservation successful!";
    			alert(message);
                // document.getElementById('hoten').value = '';
                // document.getElementById('sdt').value = '';
                // document.getElementById('username').value = '';
                // document.getElementById('email').value = '';
                // document.getElementById('matkhau').value = '';
                // document.getElementById('matkhau2').value = '';
                // document.getElementById('diachi').value = '';
                // document.getElementById('qh').value = '';
                
                
             
                // var textarea = document.getElementById("address");
                //     textarea.value = "";
                // console.log(document.getElementById('address'));
             
					}
		 </script>
</body>


<?php
@include('inc/footer.php');
?>