<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');

?>

<?php 
class menu
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_menu($data, $files){
        
        $MN_TEN       = mysqli_real_escape_string($this->db->link, $data['MN_TEN']);
        $MN_GIA       = mysqli_real_escape_string($this->db->link, $data['MN_GIA']);
        $MN_TINHTRANG = mysqli_real_escape_string($this->db->link, $data['MN_TINHTRANG']);
        $MN_MOTA      = mysqli_real_escape_string($this->db->link, $data['MN_MOTA']);


        //Kiểm tra và lấy hình ảnh cho vào thư mục uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['MN_HINHANH']['name'];  
        $file_size = $_FILES['MN_HINHANH']['size'];  
        $file_temp = $_FILES['MN_HINHANH']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../images/".$unique_image;

        if($MN_TEN == "" || $MN_GIA == "" || $MN_TINHTRANG =="" || $MN_MOTA ==""){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO menu(MN_TEN, MN_GIA, MN_TINHTRANG, MN_HINHANH, MN_MOTA)
            VALUES ('$MN_TEN','$MN_GIA',, '$MN_TINHTRANG','$unique_image', '$MN_MOTA')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm menu thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Thêm menu thất bại!!!</span>";
                return $alert; 
            }
           
        }

    }
    public function show_menu (){
        $query = "SELECT * FROM menu ORDER BY MN_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }


    public function update_menu($data,$files,$id){

        $MN_TEN       = mysqli_real_escape_string($this->db->link, $data['MN_TEN']);
        $MN_GIA       = mysqli_real_escape_string($this->db->link, $data['MN_GIA']);
        $TA_MA       = mysqli_real_escape_string($this->db->link, $data['TA_MA']);
        // $MA_MOTA      = mysqli_real_escape_string($this->db->link, $data['MA_MOTA']);
        $MN_HINHANH= mysqli_real_escape_string($this->db->link, $data['MN_HINHANH']);
        
        //Kiểm tra và lấy hình ảnh cho vào thư mục uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['MN_HINHANH']['name'];  
        $file_size = $_FILES['MN_HINHANH']['size'];  
        $file_temp = $_FILES['MN_HINHANH']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../images/".$unique_image;

        if($MN_TEN == "" || $MN_GIA == "" || $TA_MA=="" ){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Chọn ảnh để up || $MA_HINHANH == ""
                if($file_size > 404800){
                    $alert = "<span class='error'> Kích thước ảnh quá lớn!!! Bạn chỉ được upload ảnh dưới 40GB</span>";
                    return $alert;
                }elseif(in_array($file_ext, $permited) == false)
                {
                    $alert = "<span class='error'> Bạn chỉ được upload hình thuộc định dạng: - ".implode(',',$permited)."</span>";
                    return $alert;
                }
                $query = "UPDATE menu SET 
                MN_TEN = '$MN_TEN', 
                MN_GIA = '$MN_GIA',
                TA_MA = '$TA_MA',
                
                MN_HINHANH = '$unique_image'
                WHERE MN_MA = '$id'";
            }else{
                //Không chọn ảnh
                $query = "UPDATE menu SET 
                MN_TEN = '$MN_TEN',
                MN_GIA = '$MN_GIA',
                MA_MA = '$TA_MA',
             
                WHERE MN_MA = '$id'";
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

    public function delete_menu($id) {
        $query = "DELETE FROM menu WHERE MN_MA = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'> Xóa danh mục sản phẩm thành công!</span>";
            return $alert; 
        }else{
            $alert = "<span class='error'> Xóa danh mục sản phẩm thất bại!!!</span>";
            return $alert; 
        }   
    }
    public function getmenubyId($id){
        $query = "SELECT * FROM menu WHERE MN_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_tenmon (){
        $query = "SELECT * FROM thucan ORDER BY TA_TEN DESC";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function show_loaithucan (){
        $query = "SELECT * FROM loai_thuc_an ORDER BY LTA_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_menu (){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*, combo.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        JOIN combo ON thucan.CB_MA = combo.CB_MA
        WHERE thucan.CB_MA IS NOT NULL";
        $result = $this->db->select($query);
        return $result;
    }
}
?>