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

        function getByKeyword($keyword){
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
        function store($data){
            $name = $data['name'];
            $categoryId = $data['categoryId'];
            $size = $data['size'];
            $price = $data['price'];
            $description = $data['description'];
            $imageName = $data['image'];

            $stmt = $this->db->prepare("INSERT INTO CAKES(name, id_cake_type, price, size, description, image) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("siiiss", $name, $categoryId, $size, $price, $description, $imageName);

            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function update($data){
            $name = $data['name'];
            $categoryId = $data['categoryId'];
            $size = $data['size'];
            $price = $data['price'];
            $description = $data['description'];
            $imageName = $data['image'];
            $id = $data['id'];
            $stmt = $this->db->prepare("UPDATE CAKES set name = ?, id_cake_type = ?, size = ?, price = ?, description = ?, image = ? WHERE id = ?");
            $stmt->bind_param("siiissi", $name, $categoryId, $size, $price, $description, $imageName, $id);
        
            $stmt->execute();
            $result = $stmt->affected_rows;
        
            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }

        function delete($id){
            $stmt = $this->db->prepare("DELETE FROM CAKES WHERE id = $id");
            $stmt->bind_param("i", $id);
            $isSuccess = $stmt->execute();
            if(!$isSuccess){
                return $stmt->error;
            } else if($stmt->affected_rows <= 0){
                return "don't exist";
            }
        }
    }
?>