<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');

?>

<?php 
class type
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_category($LTA_TEN){
        $LTA_TEN = $this -> fm -> validation ($LTA_TEN);
        $LTA_TEN = mysqli_real_escape_string($this->db->link, $LTA_TEN);

        if(empty($LTA_TEN)){
            $alert = "<span class='error'> loai_thuc_an không được trống!!!</span>";
            return $alert;
        }else{
            $query = "INSERT INTO loai_thuc_an(LTA_TEN) VALUES ('$LTA_TEN')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm loai_thuc_an thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Thêm loai_thuc_an thất bại!!!</span>";
                return $alert; 
            }

           
        }

    }

    public function update_category($LTA_TEN,$id){
        $LTA_TEN = $this -> fm -> validation ($LTA_TEN);
        $LTA_TEN = mysqli_real_escape_string($this->db->link, $LTA_TEN);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($LTA_TEN)){
            $alert = "<span class='error'> Danh mục loai_thuc_an không được trống!!!</span>";
            return $alert;
        }else{
            $query = "UPDATE loai_thuc_an SET LTA_TEN = '$LTA_TEN' WHERE LTA_MA = '$id'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'> Cập nhật loai_thuc_an thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Cập nhật loai_thuc_an thất bại!!!</span>";
                return $alert; 
            }

           
        }
    }

    public function delete_category($id) {
        $query = "DELETE FROM loai_thuc_an WHERE LTA_MA = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'> Xóa danh mục sản phẩm thành công!</span>";
            return $alert; 
        }else{
            $alert = "<span class='error'> Xóa danh mục sản phẩm thất bại!!!</span>";
            return $alert; 
        }   
    }
    public function getcatbyId($id){
        $query = "SELECT * FROM loai_thuc_an WHERE LTA_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_type (){
        $query = "SELECT * FROM loai_thuc_an ORDER BY LTA_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_chitietta ($id){
        $query = "SELECT chitietthucan.*, thucan.TA_MA
        FROM chitietthucan 
        JOIN thucan ON chitietthucan.TA_MA = thucan.TA_MA
        WHERE chitietthucan.TA_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>