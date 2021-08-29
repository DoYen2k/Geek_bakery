<?php
    use App\Core\Controller;

    class CakesController extends Controller {

        private $cakemodel;
        private $categorymodel;
        function __construct()
        {
            $this->cakemodel = $this->model('CakeModel');
            $this->categorymodel = $this->model('categorymodel');
        }
        function Index(){
            $cakes = $this->cakemodel->all();

            $data['cakes'] = $cakes;
            $this->view('/admin/cakes/index', $data);
        }
        function Create(){
            $categories = $this->categorymodel->all();
            $data['categories'] = $categories;
            $this->view('/admin/cakes/create', $data);
        }
        function store(){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin");
            }

            $data = $_POST;

            $data['name'] = $_POST['name'];
            $data['categoryId'] = $_POST['categoryId'];
            $data['size'] = $_POST['size'];
            $data['price'] = $_POST['price'];
            $data['description'] = $_POST['description'];
            $data["image"] = "";

            // handle image
            if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CAKE_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            }
            }

            $result = $this->cakemodel->store($data);
            if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/cakes");
            } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
            }
        }
        function edit($id){
            $cake = $this->cakemodel->getById($id);
            $categories=$this->categorymodel->all();
            if(!$cake){
                header("Location: " . DOCUMENT_ROOT . "/admin/cakes");
            }
            $data['categories'] = $categories;
            $data['cake'] = $cake;
            $this->view('/admin/cakes/edit', $data);
        }
        function update($id){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin");
            }else{

                $data = $_POST;

                $data['name'] = $_POST['name'];
                $data['categoryId'] = $_POST['categoryId'];
                $data['size'] = $_POST['size'];
                $data['price'] = $_POST['price'];
                $data['description'] = $_POST['description'];
                $data["id"] = $id;
                if ($_FILES["image"]["name"] != "") {

                    $randomNum = time();
                    $imageName = str_replace(' ', '-', strtolower($_FILES["image"]["name"]));
                    $imageExt = substr($imageName, strrpos($imageName, '.'));
                    $imageExt = str_replace('.', '', $imageExt);
                    $newImageName = $randomNum . '.' . $imageExt;

                    move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CAKE_IMAGES . DS . $newImageName);
                    $data["image"] = $newImageName;

                } else {
                    $data["image"] = $_POST["image-old"];
                }

                $result = $this->cakemodel->update($data);
                if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/cakes");
                } else {
                    if (isset($_SERVER["HTTP_REFERER"])) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }
    }
?>