<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        esta_logado();
    }

    public function index()
    {
        $this->output->enable_profiler(FALSE);
        $css['header_meio'] = '';
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = '';

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Administração</span>', '/administracao;');
        $this->breadcrumbs->push('<span>Ferramentas</span>', '/administracao/ferramentas');
        $this->breadcrumbs->push('<span>CronJob</span>', '/administracao/ferramentas/cron');

        $this->load->template('administracao/ferramentas/cronjob','',$css,$js);

    }


}

/* End of file Cron.php */
/* Location: ./application/controllers/ferramentas/Cron.php */