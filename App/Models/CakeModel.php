<?php

use App\Core\Database;

class CakeModel extends Database{
        function all(){
            $sql = 'SELECT * FROM CAKES';
            $result = $this->db->query($sql);
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getById($id){
            $stmt = $this->db->prepare("SELECT * FROM CAKES WHERE id = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows >0){
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }

        function getByKeyword($keyword)
        {
            $keyword = '%' . $keyword . '%';
            $stmt = $this->db->prepare("SELECT * FROM CAKES WHERE name like ?");
            $stmt->bind_param("s", $keyword);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
            } else {
            return false;
            }
        }
    }
?>