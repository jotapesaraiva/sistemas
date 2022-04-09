<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clusters extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('weblogic');
    }

    public function index()
    {
        $css['header_meio'] = load_css(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-select/dist/css/bootstrap-select'), 'global');
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = load_js(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-select/dist/js/bootstrap-select',
                                'scripts/configuracoes/infraestrutura/realtime/clusters'),'global');

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>Infraestrutura</span>', '/configuracoes/infraestrutura');
        $this->breadcrumbs->push('<span>Real Time</span>', '/configuracoes/infraestrutura/realtime');
        $this->breadcrumbs->push('<span>clusters</span>', '/configuracoes/infraestrutura/realtime/clusters');

        $this->load->template('configuracoes/infraestrutura/realtime/clusters', array(),$css,$js);

    }


    public function clusters_list($value) {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $clusters = $this->weblogic->getClusters($value);

        $data = array();
        foreach($clusters as $key => $value){
            $row = array();

            $row[] = $value['name'];
            $name_server = '';
            $state_server = '';
            foreach ($value['servers'] as $key => $valor) {
                $name_server .= $valor['name']. '<br>';
                $state_server .= $valor['state']. '<br>';
            }
            $row[] = $name_server;
            $row[] = $state_server;
            $data[] = $row;
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($clusters),
            "recordsFiltered" => count($clusters),
            "data" => $data,
        );
        echo json_encode($output);
    }




}

/* End of file Clusters.php */
/* Location: ./application/controllers/configuracoes/infraestrutura/realtime/Clusters.php */