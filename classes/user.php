<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class user
 {
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_users($data){
        $KH_TEN = mysqli_real_escape_string($this->db->link, $data['KH_TEN']);
        $KH_SDT = mysqli_real_escape_string($this->db->link, $data['KH_SDT']);
        $KH_EMAIL = mysqli_real_escape_string($this->db->link, $data['KH_EMAIL']);
        $KH_DIACHI = mysqli_real_escape_string($this->db->link, $data['KH_DIACHI']);
        $KH_PASSWORD = mysqli_real_escape_string($this->db->link, md5($data['KH_PASSWORD']));

        if($KH_TEN == "" || $KH_SDT == "" || $KH_EMAIL == "" || $KH_DIACHI == "" || $KH_PASSWORD == ""){
            $alert = "<span class='error'>Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            $check_email = "SELECT * FROM khachhang WHERE KH_EMAIL ='$KH_EMAIL' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'>Email đã tồn tại!!!</span>";
                return $alert;
            }else{
                $query = "INSERT INTO khachhang(KH_TEN, KH_SDT, KH_EMAIL, KH_DIACHI, KH_PASSWORD) 
                VALUES ('$KH_TEN','$KH_SDT','$KH_EMAIL','$KH_DIACHI','$KH_PASSWORD')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'> Đăng ký thành công!</span>";
                    return $alert; 
                }else{
                    $alert = "<span class='error'> Đăng ký thất bại!!!</span>";
                    return $alert; 
                }
            }
        }
    }
    public function login_user($data){

        $KH_USERNAME = mysqli_real_escape_string($this->db->link, $data['KH_USERNAME']);
        $KH_PASSWORD = mysqli_real_escape_string($this->db->link, $data['KH_PASSWORD']);

        if(empty($KH_USERNAME)||empty($KH_PASSWORD)){
            $alert = "Tài khoản và mật khẩu không được trống!!!";
            return $alert;
        }else{
            $query = "SELECT * FROM khachhang WHERE KH_USERNAME = '$KH_USERNAME' AND KH_PASSWORD = '$KH_PASSWORD'";
            $result = $this->db->select($query);
            if($result->num_rows > 0){
                $value = $result->fetch_assoc();
                session::set('user', true);
                session::set('KH_MA',$value['KH_MA']);
                session::set('Q_MA',$value['Q_MA']);
                session::set('KH_TEN',$value['KH_TEN']);
                session::set('KH_SDT',$value['KH_SDT']);
                session::set('KH_EMAIL',$value['KH_EMAIL']);
                session::set('KH_DIACHI',$value['KH_DIACHI']);
                session::set('KH_USERNAME',$value['KH_USERNAME']);
                header('location:index.php');
            }else{
                $alert = "Tài khoản hoặc mật khẩu sai!!!";
                return $alert;
            }
        }

    }

    public function show_users($id){
        $query = "SELECT * FROM khachhang WHERE KH_MA ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
   
    public function update_users($data, $id) {
    $KH_TEN = mysqli_real_escape_string($this->db->link, $data['KH_TEN']);
    $KH_SDT = mysqli_real_escape_string($this->db->link, $data['KH_SDT']);
    $KH_EMAIL = mysqli_real_escape_string($this->db->link, $data['KH_EMAIL']);
    $KH_DIACHI = mysqli_real_escape_string($this->db->link, $data['KH_DIACHI']);
    $KH_PASSWORD = isset($data['KH_PASSWORD']) ? mysqli_real_escape_string($this->db->link, md5($data['KH_PASSWORD'])) : '';

    if ($KH_TEN == "" || $KH_SDT == "" || $KH_EMAIL == "" || $KH_DIACHI == "") {
        $alert = "<span class='error'>Các thành phần này không được trống!!!</span>";
        return $alert;
    } else {
        if ($KH_PASSWORD !== '') {
            $query = "UPDATE khachhang SET KH_TEN = '$KH_TEN', KH_SDT = '$KH_SDT', KH_EMAIL = '$KH_EMAIL', 
                KH_DIACHI = '$KH_DIACHI', KH_PASSWORD = '$KH_PASSWORD'
                WHERE KH_MA = '$id'";
        } else {
            $query = "UPDATE khachhang SET KH_TEN = '$KH_TEN', KH_SDT = '$KH_SDT', KH_EMAIL = '$KH_EMAIL', KH_DIACHI = '$KH_DIACHI'
                WHERE KH_MA = '$id'";
        }

        $result = $this->db->update($query);

        if ($result) {
            $alert = "<span class='success'> Cập nhật thông tin thành công!</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Cập nhật thông tin thất bại!!!</span>";
            return $alert;
        }
    }
}

        public function get_usersid($id){
            $query = "SELECT * FROM khachhang WHERE KH_MA ='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_user(){
            $query = "SELECT * FROM khachhang ORDER BY KH_MA DESC ";
            $result = $this->db->select($query);
            return $result;
        }
        
}
?>