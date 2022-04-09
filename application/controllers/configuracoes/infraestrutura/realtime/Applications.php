<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Controller {


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
                                'scripts/configuracoes/infraestrutura/realtime/applications'),'global');

        // $modal = array(
        // 'sistemas' => $this->sistema_model->listar_sistema(),
        // 'clusters' => $this->cluster_model->listar_cluster(),
        // 'weblogics' => $this->weblogic_model->listar_weblogic()
        // );

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>Infraestrutura</span>', '/configuracoes/infraestrutura');
        $this->breadcrumbs->push('<span>Real Time</span>', '/configuracoes/infraestrutura/realtime');
        $this->breadcrumbs->push('<span>Applications</span>', '/configuracoes/infraestrutura/realtime/applications');

        $this->load->template('configuracoes/infraestrutura/realtime/applications', array(),$css,$js);

        // $this->load->view('modal/modal_servico',$modal);
    }


    public function applications_list($value) {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $applications = $this->weblogic->getApps($value);
        // vd($applications);
        $data = array();
        foreach($applications as $key => $value){
            $row = array();

            $row[] = $value['name'];
            $row[] = $value['type'];
            $row[] = $value['state'];
            // if(empty($value['health'])):
            if(isset($value['health'])):
            // if($value['health']=''):
            // if(array_key_exists('health', $value)):
                $row[] = $value['health'];
            else:
                $row[] = " ";
            endif;
            if(super_admin()):
            $row[] = "<a class='btn blue btn-outline sbold' href='javascript:void(0)' title='Start' onclick=edit_person('{$value['name']}')><i class='fa fa-play'></i></a>
                      <a class='btn green-jungle btn-outline sbold' href='javascript:void(0)' title='Restart' onclick=edit_person('{$value['name']}')><i class='fa fa-repeat'></i></a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Stop' onclick=delete_person('{$value['name']}')><i class='fa fa-stop'></i></a>";
            else:
            $row[] = 'Sem permissão';
            endif;

            $data[] = $row;
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($applications),
            "recordsFiltered" => count($applications),
            "data" => $data,
        );

        echo json_encode($output);
    }

}

/* End of file Applications.php */
/* Location: ./application/controllers/configuracoes/infraestrutura/realtime/Applications.php */