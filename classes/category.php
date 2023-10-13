<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');

?>

<?php 
class category
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_category($MN_TEN){
        $MN_TEN = $this -> fm -> validation ($MN_TEN);
        $MN_TEN = mysqli_real_escape_string($this->db->link, $MN_TEN);

        if(empty($MN_TEN)){
            $alert = "<span class='error'> Menu không được trống!!!</span>";
            return $alert;
        }else{
            $query = "INSERT INTO menu(MN_TEN) VALUES ('$MN_TEN')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm Menu thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Thêm Menu thất bại!!!</span>";
                return $alert; 
            }

           
        }

    }
    public function show_category (){
        $query = "SELECT * FROM menu ORDER BY MN_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_category($MN_TEN,$id){
        $MN_TEN = $this -> fm -> validation ($MN_TEN);
        $MN_TEN = mysqli_real_escape_string($this->db->link, $MN_TEN);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($MN_TEN)){
            $alert = "<span class='error'> Danh mục menu không được trống!!!</span>";
            return $alert;
        }else{
            $query = "UPDATE menu SET MN_TEN = '$MN_TEN' WHERE MN_MA = '$id'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'> Cập nhật Menu thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Cập nhật Menu thất bại!!!</span>";
                return $alert; 
            }

           
        }
    }

    public function delete_category($id) {
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
    public function getcatbyId($id){
        $query = "SELECT * FROM menu WHERE MN_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_category_menu (){
        $query = "SELECT * FROM menu ORDER BY MN_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }
}
?>