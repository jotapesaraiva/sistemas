<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('sistema_model');
    }

    public function index()
    {
        if (esta_logado(FAlSE)) :
            $css['header_meio'] = load_css(array(
                    'css/components.min',
                    'css/plugins.min'), 'global');
            $css['header_fim'] = load_css(array(
                    'layout/css/layout_topo',
                    'layout/css/themes/darkblue.min',
                    'layout/css/custom.min'),'layouts');
            $js['footer_meio'] = load_js(array('scripts/app.min'),'global');
            $js['footer_fim'] = load_js(array(
                    'layout/scripts/layout.min',
                    'layout/scripts/demo.min',
                    'global/scripts/quick-sidebar.min'),'layouts');

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Catalogos</span>', '/catalogos');

            $this->load->template('catalogos',array(),$css,$js);
            // $this->load->view('pages/catalogo');
        else :
            redirect('login');
        endif;
    }

}

/* End of file Catalogo.php */
/* Location: ./application/controllers/Catalogo.php */