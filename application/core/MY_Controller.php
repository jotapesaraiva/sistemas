<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {

    // public $data = array();
    public $dados = array();
    public $css = array();
    public $js = array();

    public function __construct()
    {
        parent::__construct();

        // $this->data['css'] = '';
        // $this->data['js']  = '';
        $dados[] = '';
        $css['header_fim'] = '';
        $js['footer_meio'] = '';
    }

    public function index()
    {
        $this->render();
    }


    public function render($view = '')
    {
        if ($view == '') {
            $view = $this->router->fetch_class();
        }

        $this->load->view('template/header', $css);
        $this->load->view('pages/'.$view, $dados);
        $this->load->view('template/footer', $js);
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */