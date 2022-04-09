<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        // $this->session->keep_flashdata('loginOk');
        // $this->session->keep_flashdata('errologin');
    }

    public function index() {
        $this->output->enable_profiler(TRUE);
        if (esta_logado(FAlSE)) :
            $css['header_meio'] = '';
            $css['header_fim'] = load_css(array(
                'layout6/css/layout',
                'layout/css/layout_main'),'layouts');

            $js['footer_meio'] = load_js(array('scripts/dashboard.min'),'pages');
            // $dados = array();
            $this->load->template('home',array(),$css,$js);
        else :
            redirect('login');
        endif;
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */