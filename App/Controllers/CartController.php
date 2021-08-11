<?php

use App\Core\Controller;
// http://localhost:81/Geek_Bakery/cart/addtocart?cakeId=5&userId=2
class CartController extends Controller {
        private $cartModel;
        function __construct(){
            $this->cartModel = $this->model('CartModel');
        }
        function addToCart(){
            if (isset($_GET)) {
            $result = $this->cartModel->addToCart($_GET);
            echo json_encode($result);
            return;
            }
        }
        function amountInCart(){
            if (isset($_SESSION['user'])) {
            $amount = $this->cartModel->amountInCart($_SESSION['user']['id']);
            echo $amount;
            } else {
            echo 0;
            }
        }
    }
?>