<?php
$filepath = realpath(dirname(__FILE__));
@include($filepath.'/../lib/session.php');
session::check_adminLogin();
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class adminlogin
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function login_admin($NV_username,$NV_password){
        $NV_username = $this -> fm -> validation ($NV_username);
        $NV_password = $this -> fm -> validation ($NV_password);

        $NV_username = mysqli_real_escape_string($this->db->link, $NV_username);
        $NV_password = mysqli_real_escape_string($this->db->link, $NV_password);

        if(empty($NV_username)||empty($NV_password)){
            $alert = "Tài khoản và mật khẩu không được trống!!!";
            return $alert;
        }else{
            $query = "SELECT * FROM nhanvien WHERE NV_username = '$NV_username' AND NV_password = '$NV_password' AND Q_MA = 'AD'LIMIT 1";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                session::set('adminlogin', true);
                session::set('NV_id',$value['NV_id']);
                session::set('NV_username',$value['NV_username']);
                session::set('NV_ten',$value['NV_ten']);
                header('location:index.php');
            }else{
                $alert = "Tài khoản và mật khẩu không được trống!!!";
                return $alert;
            }
        }

    }
}



?>