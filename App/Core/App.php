<?php

    namespace App\Core;

    class App {
        protected $controller= "Home";
        protected $action= "Index";
        protected $params=[];

        function __construct(){
            $arr = $this->UrlProcess();
            // Xử lí controller
            if(file_exists("./App/Controllers/". ucfirst($arr[0]) ."Controller.php")){
                $this->controller = ucfirst($arr[0]);
                unset($arr[0]); 
            }
            $this->controller = $this->controller . "Controller";
            require_once "./App/Controllers/".$this->controller.".php";

            $this->controller = new $this->controller;

            // Xử lí Action
            if (isset($arr[1])) {
                if (method_exists($this->controller, $arr[1])) {
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            // Xu li params
            $this->params = $arr?array_values($arr):[];

            //Goi ham 
            call_user_func_array([$this->controller, $this->action], $this->params );
        }
        function UrlProcess(){
            if(isset($_GET["url"])){
               return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>