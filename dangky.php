<?php
$activate = "dangky";
include('inc/header.php');
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Đăng nhập/Đăng ký</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> 
            <span>Đăng nhập/Đăng ký <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <div>
    <section class="ftco-section contact-section">
    <div class="container">
        <div class="container-fluid pt-1">
            <div class="text-center mb-4"></div>

            <div class="row px-xl-5">
                <!-- dag ky-->
                <div class="col-lg-12 mb-5" style="margin-top: -40px;">
                    <section class="dangky">
                        <div class="row">
                            <div class="col-6" >
                            <h2>Đăng ký</h2>
                            <form class="row g-3 formdangky" action="dangky.php" method="POST">

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Họ và tên<span class="error"></span> </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Tên" name="ten">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Email<span class="error">*</span> </label>
                                    <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNumberl4" class="form-label">Tên đăng nhập<span class="error"></span></label>
                                    <input type="text" class="form-control" id="username" name="username">
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
                                    <label for="inputNumberl4" class="form-label">Số điện thoại<span class="error"></span></label>
                                    <input type="text" class="form-control" id="sdt" name="sdt">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNumberl4" class="form-label">Địa chỉ<span class="error"></span></label>
                                    <input type="text" class="form-control" id="diachi" name="diachi">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Quận Huyện<span class="error">*</span></label>
                                    <select class="form-select" id="q" name="q">
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
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
@include('inc/footer.php');
?>
    <?php
    require 'functions.php';

// Kiểm tra nếu biểu mẫu đã được gửi
if (isset($_POST["dangky"])) {
    // Lấy dữ liệu từ biểu mẫu
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["psw"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    $q_ma = $_POST["q"]; // Lấy giá trị mã quận/huyện từ select

    
    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashed_password = md5($password);
    
    $nextId = getMaxId($conn,'KH_MA','khachhang')+1;

    // Tạo câu lệnh SQL để chèn dữ liệu vào bảng khachhang (loại bỏ KH_MA)
    $sql = "INSERT INTO khachhang VALUES ($nextId, $q_ma, '$ten', '$sdt', '$email', $diachi, '$username', '$hashed_password')";

    // Thực hiện câu lệnh SQL và kiểm tra kết quả
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">
            alert("Đăng ký thành công! Vui lòng đăng nhập lại!");
            window.location.href = "login.php"; // Chuyển hướng sau khi đăng ký thành công
            </script>';
    } else {
        echo "Lỗi khi thực hiện đăng ký: " . $conn->error;
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}
?>
<?php

// require 'functions.php';

function querySql($conn, $sql){
    $conn->query($sql);
}

function querySqlwithResult($conn, $sql){
    $result = $conn->query($sql);
    return $result;
}
function getMaxId($conn, $column, $table){
    $sql = "select max($column) as maxid from $table";
    $result = $conn->query($sql);
    $rs = $result->fetch_assoc();
    return $rs['maxid'];
}
// Vi du: $maxId = getMaxId($conn, 'NV_MA', 'nhanvien'); $nextId = $maxId + 1;

function uploadImage($file, $filename, $tar_dir, $fname){

    move_uploaded_file($file['tmp_name'],$tar_dir.$filename);

    $new_filename = $fname;

    rename($tar_dir.$filename, $tar_dir.$new_filename);

    return $new_filename;
}
// Vi du:   $carID = $_POST['carid'];
//          $file = $_FILES["imgProduct"];
//          $filename = $file['name'];
//          $img = uploadImage($file, $filename, "../images/car/", $carID.'.png');

?>