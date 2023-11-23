<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath . '/../lib/database.php');
@include_once($filepath . '/../helpers/format.php');
?>

<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_cart($data, $id)
    {
        $GH_SL      = mysqli_real_escape_string($this->db->link, $data['GH_SL']);
        $TA_MA      = mysqli_real_escape_string($this->db->link, $data['TA_MA']);
        $GH_MASS    = session_id();
        $id         = mysqli_real_escape_string($this->db->link, $id);
        $GH_GHICHU  = mysqli_real_escape_string($this->db->link, $data['GH_GHICHU']);

        $query_cart = "SELECT * FROM giohang WHERE TA_MA = '$TA_MA' AND GH_MASS = '$GH_MASS'";
        $check_cart =  $this->db->select($query_cart);
        if ($check_cart) {
            $alert = "<span class = 'error'>Sản phẩm đã có trong giỏ hàng</span>";
            return $alert;
        } else {
            $query_gia = "SELECT CTTA_DONGIA FROM chitietthucan WHERE TA_MA = '$TA_MA'";
            $check_gia = $this->db->select($query_gia);
            if ($check_gia) {
                $check_gia = $check_gia->fetch_assoc();
                $GH_GIA =  $check_gia["CTTA_DONGIA"] * $GH_SL;
                $query_insert = "INSERT INTO giohang(TA_MA, GH_MASS, KH_MA, GH_SL, GH_GIA, GH_GHICHU) 
                VALUES ('$TA_MA','$GH_MASS','$id', '$GH_SL', '$GH_GIA', '$GH_GHICHU')";
                $insert_cart = $this->db->insert($query_insert);
                if ($insert_cart) {
                    $alert = "<span class = 'success'>Thêm món ăn thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class = 'error'>Thêm món ăn thất bại</span>";
                    return $alert;
                }
            } else {
                $alert = "<span class = 'error'>Không lấy được giá sản phẩm</span>";
                return $alert;
            }
        }
    }
    public function add_order($data, $id){
        $GH_SL = is_array($data['GH_SL']) ? array_map(function ($value) {
            return mysqli_real_escape_string($this->db->link, $value);
        }, $data['GH_SL']) : [];

        $TA_MA = is_array($data['TA_MA']) ? $data['TA_MA'] : [];

        $id = mysqli_real_escape_string($this->db->link, $id);

        // Kiểm tra xem đơn hàng đã tồn tại chưa

        $total_price = 0;

        foreach ($GH_SL as $index => $quantity) {
            $TA_MA_item = mysqli_real_escape_string($this->db->link, $TA_MA[$index]);

            $query_gia = "SELECT CTTA_DONGIA FROM chitietthucan WHERE TA_MA = '$TA_MA_item'";
            $check_gia = $this->db->select($query_gia);

            if ($check_gia) {
                $check_gia = $check_gia->fetch_assoc();
                $GH_GIA = $check_gia["CTTA_DONGIA"] * $quantity;
                $total_price += $GH_GIA;

                $query_insert = "INSERT INTO phieudatmon(PDM_SL, PDM_GIATIEN, KH_MA, TA_MA, PDM_THOIGIAN, PDM_TRANGTHAI) 
                VALUES ('$quantity','$GH_GIA','$id', '$TA_MA_item', NOW(), 0)";

                $insert_cart = $this->db->insert($query_insert);

                if (!$insert_cart) {
                    $alert = "<span class='error'>Thanh toán thất bại</span>";
                    return $alert;
                }
            } else {
                $alert = "<span class='error'>Không lấy được giá sản phẩm</span>";
                return $alert;
            }
        }
        header('Location: payment.php?total_price=' . $total_price);
        exit();
    }


    public function getproduct_cart()
    {
        $GH_MASS = session_id();
        $query = "SELECT * FROM giohang WHERE GH_MASS = '$GH_MASS'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product_info($GH_MA)
    {
        $GH_MASS = session_id();
        $GH_MA = mysqli_real_escape_string($this->db->link, $GH_MA);
        $query = "SELECT * FROM giohang WHERE GH_MA = '$GH_MA' AND GH_MASS = '$GH_MASS'";
        $result = $this->db->select($query);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    public function up_quantity_cart($GH_SL, $GH_MA, $new_price)
    {
        $GH_SL      = mysqli_real_escape_string($this->db->link, $GH_SL);
        $GH_MA      = mysqli_real_escape_string($this->db->link, $GH_MA);
        $new_price  = mysqli_real_escape_string($this->db->link, $new_price);

        $query = "UPDATE giohang SET GH_SL = '$GH_SL', GH_GIA = '$new_price' WHERE GH_MA = '$GH_MA'";
        $result = $this->db->update($query);
        if ($result) {
            header('Location:orderfood.php');
        } else {
            $thbao = "<span class = 'error'>Cập nhật số lượng sản phẩm thất bại</span>";
            return $thbao;
        }
    }
    public function delete_cart($GH_MA)
    {
        $GH_MA  = mysqli_real_escape_string($this->db->link, $GH_MA);
        $query  = "DELETE FROM giohang WHERE GH_MA = '$GH_MA'";
        $result = $this->db->delete($query);
        if ($result) {
            header('Location:orderfood.php');
        } else {
            $thbao = "<span class = 'error'>Xóa sản phẩm thất bại</span>";
            return $thbao;
        }
    }
    public function check_cart()
    {
        $GH_MASS = session_id();
        $query = "SELECT * FROM giohang WHERE GH_MASS = '$GH_MASS'";
        $result = $this->db->select($query);
        return $result;
    }

    //dat ban
    public function insert_cart($data, $id){
        $PDH_TENKH      = mysqli_real_escape_string($this->db->link, $data['PDH_TENKH']);
        $PDH_EMAILKH    = mysqli_real_escape_string($this->db->link, $data['PDH_EMAILKH']);
        $PDH_SDTKH      = mysqli_real_escape_string($this->db->link, $data['PDH_SDTKH']);
        $PDH_TG         = mysqli_real_escape_string($this->db->link, $data['PDH_TG']);
        $PDH_NGAYLAP    = mysqli_real_escape_string($this->db->link, $data['PDH_NGAYLAP']);
        $PDH_SONGUOI    = mysqli_real_escape_string($this->db->link, $data['PDH_SONGUOI']);
        $PDH_GHICHU     = mysqli_real_escape_string($this->db->link, $data['PDH_GHICHU']);
        $id             = mysqli_real_escape_string($this->db->link, $id);

        $sql_menu = "SELECT * FROM menu WHERE MN_MA = '$id'";
        $query_menu = $this->db->select($sql_menu)->fetch_assoc();

        $PDH_SLMENU     = mysqli_real_escape_string($this->db->link, $data['PDH_SLMENU']);



        if (
            $PDH_TENKH == "" || $PDH_EMAILKH == "" || $PDH_SDTKH == "" || $PDH_TG == ""
            || $PDH_NGAYLAP == "" || $PDH_SONGUOI == "" || $id == "" || $PDH_SLMENU == ""
        ) {
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        } else {
            $query = "INSERT INTO phieudathang(PDH_TENKH, PDH_EMAILKH, PDH_SDTKH, MN_MA, PDH_SLMENU, 
            PDH_TG, PDH_NGAYLAP, PDH_SONGUOI, PDH_GHICHU) 
            VALUES ('$PDH_TENKH','$PDH_EMAILKH','$PDH_SDTKH', '$id', '$PDH_SLMENU',
            '$PDH_TG','$PDH_NGAYLAP','$PDH_SONGUOI','$PDH_GHICHU')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Đặt bàn thành công!!! Chúng tôi sẽ sớm liên hệ với bạn!!!</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Đặt bàn thất bại!!! Vui lòng đặt lại!!!</span>";
                return $alert;
            }
        }
    }
    public function getphieudatmon($id) {
        $sql = "SELECT * FROM phieudatmon 
        JOIN thucan ON phieudatmon.TA_MA = thucan.TA_MA
        WHERE KH_MA = '$id' ";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getphieudatmonadmin() {
        $sql = "SELECT * FROM phieudatmon 
        JOIN thucan ON phieudatmon.TA_MA = thucan.TA_MA
        JOIN khachhang ON phieudatmon.KH_MA = khachhang.KH_MA
        ";
        $result = $this->db->select($sql);
        return $result;

    }
    public function updatepdm($id, $PDM_TRANGTHAI) {
        $PDM_TRANGTHAI      = mysqli_real_escape_string($this->db->link, $PDM_TRANGTHAI);
        $sql = "UPDATE phieudatmon SET PDM_TRANGTHAI = '$PDM_TRANGTHAI' WHERE PDM_MA = '$id'";
        $result = $this->db->update($sql);
        if ($result) {
            $thbao = "<span class = 'sussucce'>Cập nhật trạng thái thành công</span>";
            return $thbao;
        } else {
            $thbao = "<span class = 'error'>Cập nhật trạng thái thất bại</span>";
            return $thbao;
        }

    }
}
?>