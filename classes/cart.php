<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class cart
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function add_cart($GH_SOLUONG, $id){
        $GH_SOLUONG      = $this -> fm -> validation ($GH_SOLUONG);
        $GH_SOLUONG      = mysqli_real_escape_string($this->db->link, $GH_SOLUONG);
        $id              = mysqli_real_escape_string($this->db->link, $id);
        $GH_MASS         = session_id();

        $query = "SELECT * FROM sanpham WHERE SP_MA = '$id' ";
        $result = $this->db->select($query)->fetch_assoc();
        
        $SP_TEN = $result["SP_TEN"];
        $SP_GIA = $result["SP_GIA"];
        $SP_MAU = $result["SP_MAU"];
        $SP_HINHANH = $result["SP_HINHANH"];

        $query_cart = "SELECT * FROM giohang WHERE SP_MA = '$id' AND GH_MASS = '$GH_MASS'";
        $check_cart =  $this->db->select($query_cart); 
        if($check_cart){
            $thbao = "<span class = 'error'>Sản phẩm đã có trong giỏ hàng</span>";
            return $thbao;
        }else{
            $query_insert = "INSERT INTO giohang(SP_MA, GH_MASS, SP_TEN, SP_GIA, GH_SOLUONG, SP_MAU, SP_HINHANH) 
            VALUES ('$id','$GH_MASS','$SP_TEN','$SP_GIA','$GH_SOLUONG','$SP_MAU','$SP_HINHANH')";
            $insert_cart = $this->db->insert($query_insert);
            if($result){
                header('Location: cart.php ');
            }else{
                header('Location: 404.php '); 
            }
        }
    }
    public function getproduct_cart(){
        $GH_MASS = session_id();
        $query = "SELECT * FROM giohang WHERE GH_MASS = '$GH_MASS'";
        $result = $this->db->select($query);
        return $result;
    }
    public function up_quantity_cart($GH_SOLUONG, $GH_MA){
        $GH_SOLUONG      = mysqli_real_escape_string($this->db->link, $GH_SOLUONG);
        $GH_MA          = mysqli_real_escape_string($this->db->link, $GH_MA);

        $query = "UPDATE giohang SET GH_SOLUONG = '$GH_SOLUONG' WHERE GH_MA = '$GH_MA'";
                
        $result = $this->db->update($query);
        if($result){
            header('Location:cart.php');
        }else{
            $thbao = "<span class = 'error'>Cập nhật số lượng sản phẩm thất bại</span>";
            return $thbao;
        }

    }
    public function delete_cart($GH_MA){
        $GH_MA  = mysqli_real_escape_string($this->db->link, $GH_MA);
        $query  = "DELETE FROM giohang WHERE GH_MA = '$GH_MA'";
        $result = $this->db->delete($query);
        if($result){
            header('Location:cart.php');
        }else{
            $thbao = "<span class = 'error'>Xóa sản phẩm thất bại</span>";
            return $thbao;
        }
    }
    public function check_cart(){
        $GH_MASS = session_id();
        $query = "SELECT * FROM giohang WHERE GH_MASS = '$GH_MASS'";
        $result = $this->db->select($query);
        return $result;
    }

    //dat ban
    public function insert_cart($data){
        $PDH_TENKH      = mysqli_real_escape_string($this->db->link, $data['PDH_TENKH']);
        $PDH_EMAILKH    = mysqli_real_escape_string($this->db->link, $data['PDH_EMAILKH']);
        $PDH_SDTKH      = mysqli_real_escape_string($this->db->link, $data['PDH_SDTKH']);
        $PDH_TG         = mysqli_real_escape_string($this->db->link, $data['PDH_TG']);
        $PDH_NGAYLAP    = mysqli_real_escape_string($this->db->link, $data['PDH_NGAYLAP']);
        $PDH_SONGUOI    = mysqli_real_escape_string($this->db->link, $data['PDH_SONGUOI']);
        $PDH_GHICHU     = mysqli_real_escape_string($this->db->link, $data['PDH_GHICHU']);


        if($PDH_TENKH == "" || $PDH_EMAILKH == "" || $PDH_SDTKH == "" || $PDH_TG == "" || $PDH_NGAYLAP == "" || $PDH_SONGUOI == ""){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            $query = "INSERT INTO phieudathang(PDH_TENKH, PDH_EMAILKH, PDH_SDTKH, PDH_TG, PDH_NGAYLAP, PDH_SONGUOI, PDH_GHICHU) 
            VALUES ('$PDH_TENKH','$PDH_EMAILKH','$PDH_SDTKH','$PDH_TG','$PDH_NGAYLAP','$PDH_SONGUOI','$PDH_GHICHU')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Đặt bàn thành công!!! Chúng tôi sẽ sớm liên hệ với bạn!!!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Đặt bàn thất bại!!! Vui lòng đặt lại!!!</span>";
                return $alert; 
            }
           
        }
    }
}
?>