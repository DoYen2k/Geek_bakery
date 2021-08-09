<?php
    use App\Core\Controller;

    class CakesController extends Controller {

        private $cakemodel;
        function __construct()
        {
            $this->cakemodel = $this->model('CakeModel');
        }
        function Index(){
            $cakes = $this->cakemodel->all();
            $data['cakes'] = $cakes;
            $this->view('/cakes/index', $data);
        }



        function Search()
        {
            $keyword = $_POST['keyword'];
            $cakes = $this->cakemodel->getByKeyword($keyword);

            $data['keyword'] = $keyword;
            $data['cakes'] = $cakes;

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $this->view("/cakes/search", $data);
        }
    }
?>