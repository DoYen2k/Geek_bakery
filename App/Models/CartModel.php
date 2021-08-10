<?php

use App\Core\Database;

class CartModel extends Database{

    function checkCakeInCart($userId, $cakeId){
        $stmt = $this->db->prepare("SELECT * FROM CART WHERE id_cake = ? AND id_user = ?");
        $stmt->bind_param("ii", $cakeId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
        $cart = $result->fetch_assoc();
        return $cart['amount'];
        }
        return 0;
    }

    function amountInCart($userId){
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM CART WHERE id_user = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row()[0];
    }

    function addToCart($data){
        // $data['userId'];
        // $data['cakeId'];
        // echo $data['userId'];
        // die();
    if (!isset($data['userId']) || !isset($data['cakeId'])) {
        // var_dump($data) ;
        // die();
    return [
        'isSuccess' => false,
        'numInCart' => 0,
        'error' => "Empty user id or cake id"
    ];
    }

    $cakeId = $data['cakeId'];
    $userId = $data['userId'];
    $amount = 1;

    $amountInCart = $this->checkCakeInCart($userId, $cakeId);
    $isSuccess = true;
    $error = "";

    if ($amountInCart > 0) {
    $amount += $amountInCart;
    $stmt = $this->db->prepare("UPDATE CART SET amount = ? WHERE id_user = ? AND id_cake = ?");
    $stmt->bind_param("iii", $amount, $userId, $cakeId);

    $stmt->execute();
    if ($stmt->error) {
        $isSuccess = false;
        $error = $stmt->error;
    }
    } else {
        $stmt = $this->db->prepare("INSERT INTO CART(id_cake, id_user, amount) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $cakeId, $userId, $amount);

        $stmt->execute();
        if ($stmt->error) {
            $isSuccess = false;
            $error = $stmt->error;
        }
    }

    $numInCart = $this->amountInCart($userId);
    return [
    'isSuccess' => $isSuccess,
    'numInCart' => $numInCart,
    'error' => $error];
    }

    function deleteInCart($userId, $cakeId){
        $stmt = $this->db->prepare("DELETE FROM CART WHERE id_cake = ? AND id_user = ?");
        $stmt->bind_param("ii", $cakeId, $userId);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
        return true;
        }
        return false;
    }
    }
?>
