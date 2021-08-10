<?php
    use App\Core\Controller;

    class AccountController extends Controller {

        private $usermodel;
        function  __construct()
        {
            $this->usermodel= $this->model('UserModel');
        }
        function index (){
            $this->view('/account/login');
        }
        function register (){
            $this->view('/account/register');
        }
        function signup(){
            if (isset($_POST)) {
                $result = $this->usermodel->register($_POST);
                if ($result === true) {
                    $data['message'][] = "Register successful. Please login!";
                    $this->view('/account/login', $data);
                } else {
                    $data['error'][] = "Register unsuccessful!";
                    $this->view('/account/register', $data);
                    return;
                }
            }
        }
        function authenticate(){
            if (isset($_POST)) {
            $result = $this->usermodel->authenticate($_POST);
            if ($result === true) {
                $user = $this->usermodel->getByEmail($_POST['email']);
                $_SESSION['user'] = $user;
                header("Location: " . DOCUMENT_ROOT);
                return;
            } else {
                $data['error'][] = $result;
            }
            } else {
            $data['error'][] = "Email and password can't be empty!";
            }
            $this->view('/account/login', $data);
        }
        function signout(){
            unset($_SESSION['user']);
            header("Location: " . DOCUMENT_ROOT);
            return;
        }
        function checkvalidemail(){
            if (isset($_GET['email'])) {
                $result =  $this->usermodel->checkValidEmail($_GET['email']);
                if ($result == true) {
                  echo "true";
                  return;
                } else {
                  echo "false";
                  return;
                }
              }
            echo "false";
        }
    }
?>