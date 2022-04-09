<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        echo "teste ok 2 !!!";
    }

    public function renderizar()
    {
        $this->render();
    }
}


/* End of file Teste.php */
/* Location: ./application/controllers/Teste.php */