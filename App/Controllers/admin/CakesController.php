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

            $this->view('/admin/cakes/index', $data);
        }
    }
?>