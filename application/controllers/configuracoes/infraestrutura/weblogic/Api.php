<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
                                'scripts/configuracoes/infraestrutura/weblogic/api'),'global');

        // $modal = array(
        // 'sistemas' => $this->sistema_model->listar_sistema(),
        // 'clusters' => $this->cluster_model->listar_cluster(),
        // 'weblogics' => $this->weblogic_model->listar_weblogic()
        // );

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>Infraestrutura</span>', '/configuracoes/infraestrutura');
        $this->breadcrumbs->push('<span>Weblogic</span>', '/configuracoes/infraestrutura/weblogic');
        $this->breadcrumbs->push('<span>api</span>', '/configuracoes/infraestrutura/weblogic/api');

        $this->load->template('configuracoes/infraestrutura/weblogic/api', array(),$css,$js);

        // $this->load->view('modal/modal_servico',$modal);
    }


    public function api_list($value) {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->weblogic->getServers($value);
        // vd($resultados);
        $data = array();
        foreach($resultados as $key => $resultado){
            $row = array();

            $row[] = $resultado['name'];
            $row[] = $resultado['state'];
            // $row[] = $resultado['health'];
            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['name']}')><i class='glyphicon glyphicon-pencil'></i></a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['name']}')><i class='glyphicon glyphicon-trash'></i></a>";
            else:
            $row[] = 'Sem permissão';
            endif;

            $data[] = $row;
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($resultados),
            "recordsFiltered" => count($resultados),
            "data" => $data,
        );

        echo json_encode($output);
    }


}

/* End of file Api.php */
/* Location: ./application/controllers/configuracoes/infraestrutura/weblogic/Api.php */