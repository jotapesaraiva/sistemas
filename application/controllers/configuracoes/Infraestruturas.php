<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infraestruturas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        esta_logado();
        $this->load->helper('alert_helper');
        $this->load->helper('username');
        $this->load->model('sistema_model');
    }

    public function index()
    {
        $css['header_meio'] = '';
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');
        $js['footer_meio'] = '';

        $dados = array();

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Catalogos</span>', '/catalogos');
        $this->breadcrumbs->push('<span>Infraestrutura</span>', '/catalogo/infraestrutura');

        $this->load->template('catalogo/infraestruturas',$dados,$css,$js);
    }

}

/* End of file Infraestruturas.php */
/* Location: ./application/controllers/catalogo/Infraestruturas.php */