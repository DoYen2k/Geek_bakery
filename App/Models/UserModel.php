<?php

    use App\Core\Database;

    class UserModel extends Database{

        function authenticate($data) {
            $email = $data['email'];
            $pw = $data['password'];
            $stmt = $this->db->prepare("SELECT * FROM USERS WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
              $passwordHashed = $result->fetch_assoc()['password'];
              $isValidPassword = password_verify($pw, $passwordHashed);
              if ($isValidPassword == true) {
                return true;
              } else {
                return "Password incorrect!";
              }
            } else {
              return "Do not exist email: " . $email;
            }
        }

        function register($data){
            $name = $data['name'];
            $email = $data['email'];
            $pw = password_hash($data['password'], PASSWORD_DEFAULT);
            $role = 1;
            $stmt = $this->db->prepare("INSERT INTO USERS(name, email, password, role) values(?, ?, ?, ?)");
            $stmt->bind_param("sssi", $name, $email, $pw, $role);

            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result <1) {
                return false;
            }
            else {
                return true;
            }
        }

        function getByEmail($email){
            $stmt = $this->db->prepare("SELECT id, name, phone, email, avatar FROM USERS WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
            return $result->fetch_assoc();
            } else {
            return false;
            }
        }
        function checkValidEmail($email){
          $stmt = $this->db->prepare("SELECT * FROM USERS WHERE Email = ?");
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows > 0) {
            return false;
          } else {
            return true;
          }
        }
    }
?>