<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/forTAt.php');
?>

<?php 
class product
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_product($data,$files){
        $TA_TEN       = mysqli_real_escape_string($this->db->link, $data['TA_TEN']);
        $TA_GIA       = mysqli_real_escape_string($this->db->link, $data['TA_GIA']);
        $LTA_TA      = mysqli_real_escape_string($this->db->link, $data['LTA_TA']);
        $TA_MOTA      = mysqli_real_escape_string($this->db->link, $data['TA_MOTA']);
        $TA_TINHTRANG = mysqli_real_escape_string($this->db->link, $data['TA_TINHTRANG']);
        
        // $danhmuc      = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
        // $loai_sp      = mysqli_real_escape_string($this->db->link, $data['loai_sp']);  
        // $SP_TAU       = mysqli_real_escape_string($this->db->link, $data['SP_TAU']);
        // $SP_TRANGTHAI = mysqli_real_escape_string($this->db->link, $data['SP_TRANGTHAI']);
        

        //Kiểm tra và lấy hình ảnh cho vào thư mục uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['TA_HINHANH']['name'];  
        $file_size = $_FILES['TA_HINHANH']['size'];  
        $file_temp = $_FILES['TA_HINHANH']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_iTAge = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_iTAge = "../iTAges/".$unique_iTAge;

        if($TA_TEN == "" || $LTA_TA=="" || $TA_GIA == "" || $TA_MOTA == "" || $TA_TINHTRANG =="" ){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_iTAge);
            $query = "INSERT INTO thucan(TA_TEN, LTA_TA, TA_GIA, TA_MOTA, TA_TINHTRANG, TA_HINHANH)
            VALUES ('$TA_TEN','$LTA_TA','$TA_GIA','$TA_MOTA', '$TA_TINHTRANG','$unique_iTAge')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm sản phẩm thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Thêm sản phẩm thất bại!!!</span>";
                return $alert; 
            }
           
        }

    }
    public function show_product (){
        $query = "SELECT * from thucan";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data,$files,$id){

        $TA_TEN       = mysqli_real_escape_string($this->db->link, $data['TA_TEN']);
        $TA_GIA       = mysqli_real_escape_string($this->db->link, $data['TA_GIA']);
        $LTA_MA       = mysqli_real_escape_string($this->db->link, $data['LTA_MA']);
        $TA_MOTA      = mysqli_real_escape_string($this->db->link, $data['TA_MOTA']);
        $TA_TINHTRANG = mysqli_real_escape_string($this->db->link, $data['TA_TINHTRANG']);
        
        //Kiểm tra và lấy hình ảnh cho vào thư mục uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['TA_HINHANH']['name'];  
        $file_size = $_FILES['TA_HINHANH']['size'];  
        $file_temp = $_FILES['TA_HINHANH']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../images/".$unique_image;

        if($TA_TEN == "" || $TA_GIA == "" || $LTA_MA =="" || $TA_MOTA == "" || $TA_TINHTRANG =="" ){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Chọn ảnh để up || $TA_HINHANH == ""
                if($file_size > 404800){
                    $alert = "<span class='error'> Kích thước ảnh quá lớn!!! Bạn chỉ được upload ảnh dưới 40GB</span>";
                    return $alert;
                }elseif(in_array($file_ext, $permited) == false)
                {
                    $alert = "<span class='error'> Bạn chỉ được upload hình thuộc định dạng: - ".implode(',',$permited)."</span>";
                    return $alert;
                }
                $query = "UPDATE thucan SET 
                TA_TEN = '$TA_TEN', 
                TA_GIA = '$TA_GIA',
                LTA_MA = '$LTA_MA',
                TA_TINHTRANG = '$TA_TINHTRANG', 
                TA_HINHANH = '$unique_image'
                WHERE TA_MA = '$id'";
            }else{
                //Không chọn ảnh
                $query = "UPDATE thucan SET 
                TA_TEN = '$TA_TEN',
                TA_GIA = '$TA_GIA',
                LTA_MA = '$LTA_MA',
                TA_TINHTRANG = '$TA_TINHTRANG' 
                WHERE TA_MA = '$id'";
            }
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'> Sửa sản phẩm thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Sửa sản phẩm thất bại!!!</span>";
                return $alert; 
            }
            
        }
    }
    public function delete_product($id) {
        $query = "DELETE FROM thucan WHERE TA_MA = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'> Xóa sản phẩm thành công!</span>"; 
            return $alert; 
        }else{
            $alert = "<span class='error'> Xóa sản phẩm thất bại!!!</span>";
            return $alert; 
        }   
    }
    public function getproductbyId($id){
        $query = "SELECT * FROM thucan WHERE TA_TA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    //end back-end
    public function getproduct_limit(){
        $query = "SELECT * FROM thucan ORDER BY TA_MA DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_new(){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        ORDER BY thucan.TA_MA LIMIT 6";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_details($id){
        $query = "SELECT * FROM chitietthucan
        WHERE chitietthucan.TA_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

}
?>