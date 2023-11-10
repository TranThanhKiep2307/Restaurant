<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
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
        $TA_MA        = mysqli_real_escape_string($this->db->link, $data['TA_MA']);
        $TA_TEN       = mysqli_real_escape_string($this->db->link, $data['TA_TEN']);
        $CTTA_DONGIA  = mysqli_real_escape_string($this->db->link, $data['CTTA_DONGIA']);
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

        if ($TA_MA == "" ||$TA_TEN == "" || $LTA_MA == "" || $CTTA_DONGIA == "" || $TA_MOTA == "" || $TA_TINHTRANG == "") {
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);

            $query_thucan = "INSERT INTO thucan(TA_MA, TA_TEN, LTA_MA, TA_MOTA, TA_TINHTRANG, TA_HINHANH) 
            VALUES ('$TA_MA', '$TA_TEN','$LTA_MA','$TA_MOTA', '$TA_TINHTRANG','$unique_image')";
            $result_thucan = $this->db->insert($query_thucan);            
           
            if ($result_thucan) {
                // Lấy ID mới chèn vào bảng "thucan"    
                $query_chitietthucan = "INSERT INTO chitietthucan(TA_MA, CTTA_DONGIA) VALUES ('$TA_MA','$CTTA_DONGIA')";
                $result_chitietthucan = $this->db->insert($query_chitietthucan);
                
    
                if ($result_chitietthucan) {
                    $alert = "<span class='success'> Thêm sản phẩm thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Thêm sản phẩm thất bại!!!</span>";
                    return $alert;
                }
            } else {
                echo 'Lỗi rồi fix đi';
            }
        }
    }
    public function show_product (){
        $query = "SELECT thucan.*, chitietthucan.* 
        from thucan
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        ";
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
        $query_xoachitietta = "DELETE FROM chitietthucan WHERE TA_MA = '$id'";
        $result = $this->db->delete($query_xoachitietta);
        if($result){
            $query_xoata = "DELETE FROM thucan WHERE TA_MA = '$id'";
            $result_ta = $this->db->delete($query_xoata);
            if($result_ta){
                $alert = "<span class='success'> Xóa thức ăn thành công!</span>"; 
                return $alert;
            }else{
                $alert = "<span class='error'> Xóa thức ăn thất bại!!!</span>";
                return $alert; 
            } 
        }else{
            $alert = "<span class='error'> Xóa chi tiết thức ăn thất bại!!!</span>";
            return $alert; 
        }   
    }
    public function getproductbyId($id){
        $query = "SELECT * FROM thucan WHERE TA_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    //end back-end
    public function getproductbyGIA($selected_TA_MA){
        $query = "SELECT chitietthucan.CTTA_DONGIA
		FROM chitietthucan 
        JOIN thucan ON chitietthucan.TA_MA = thucan.TA_MA
        WHERE chitietthucan.TA_MA = '$selected_TA_MA'";
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['CTTA_DONGIA'];
        } else {
            return 'Lỗi nè';
        }
    }

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
    public function getproduct_lau(){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        WHERE thucan.LTA_MA = 'L01'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_nuong(){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        WHERE thucan.LTA_MA = 'T01'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_ruou(){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        WHERE thucan.LTA_MA = 'R01'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_monkem(){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        WHERE thucan.LTA_MA = 'K01'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_kem(){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        WHERE thucan.LTA_MA = 'K02'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_sot(){
        $query = "SELECT thucan.*, loai_thuc_an.*, chitietthucan.*
        FROM thucan
        JOIN loai_thuc_an ON thucan.LTA_MA = loai_thuc_an.LTA_MA
        JOIN chitietthucan ON thucan.TA_MA = chitietthucan.TA_MA
        WHERE thucan.LTA_MA = 'S01'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_name(){
        $query = "SELECT * FROM thucan ORDER BY TA_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }

}
?>