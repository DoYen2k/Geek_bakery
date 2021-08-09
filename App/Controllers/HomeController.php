<?php
    use App\Core\Controller;

    class HomeController extends Controller {

        private $cakemodel;
        private $categorymodel;
        function __construct()
        {
            $this->cakemodel = $this->model('cakemodel');
            $this->categorymodel = $this->model('categorymodel');
        }
        function Index(){
            $cakes = $this->cakemodel->all();
            if(! $cakes){
                $cakes=[];
            }
            $data['cakes'] = $cakes;
            $data['bestSellers'][] = $cakes[2];
            $data['bestSellers'][] = $cakes[5];
            $data['bestSellers'][] = $cakes[9];
            $data['bestSellers'][] = $cakes[1];
            $data['bestSellers'][] = $cakes[2];
            $data['categories'] = $this->categorymodel->all();
            // echo '<pre>';
            // print_r($data);
            // echo '<pre>';
            $this->view("./home/index", $data);
        }
    }
?>