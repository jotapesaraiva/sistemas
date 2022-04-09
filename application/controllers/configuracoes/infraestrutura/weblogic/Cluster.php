<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('cluster_model');
        $this->load->model('servidor_model');
        $this->load->model('servico_model');
        $this->load->model('certificado_model');
        $this->load->model('weblogic_model');
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
                                'scripts/configuracoes/infraestrutura/weblogic/cluster'),'global');

        $modal = array(
            // 'servicos' =>  $this->servico_model->listar_servico(),
            // 'certificados' => $this->certificado_model->listar_certificado(),
            'weblogics' => $this->weblogic_model->listar_weblogic()
        );

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>Infraestrutura</span>', '/configuracoes/infraestrutura');
        $this->breadcrumbs->push('<span>Weblogic</span>', '/configuracoes/infraestrutura/weblogic');
        $this->breadcrumbs->push('<span>Configuração</span>', '/configuracoes/infraestrutura/weblogic/cluster');

        $this->load->template('configuracoes/infraestrutura/weblogic/cluster', array(),$css,$js);

        $this->load->view('modal/modal_cluster',$modal);
    }

    public function cluster_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->cluster_model->consultar_cluster();
        // $resultados = $this->cluster_model->listar_cluster();
        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['nome_cluster'];
            // $row[] = $resultado['nome_managed_server'];
            $row[] = $resultado['nome_weblogic'];

            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['id_cluster']}')><i class='glyphicon glyphicon-pencil'></i></a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['id_cluster']}')><i class='glyphicon glyphicon-trash'></i></a>";
            else:
            $row[] = 'Sem permissão';
            endif;

            $data[] = $row;
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $resultados->num_rows(),
            "recordsFiltered" => $resultados->num_rows(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function cluster_add(){
       // $this->cluster_validate();
       $data = array(
                'nome_cluster'           => $this->input->post('cluster'),
                'id_weblogic'           => $this->input->post('weblogic'),
           );
       $insert = $this->cluster_model->save_cluster($data);
       echo json_encode(array("status" => TRUE));
    }

    public function cluster_edit($id){
       $data = $this->cluster_model->edit_cluster($id);
       echo json_encode($data);
    }

    public function cluster_update(){
       // $this->cluster_validate();
       $data = array(
                'nome_cluster'           => $this->input->post('cluster'),
                'id_weblogic'           => $this->input->post('weblogic'),
           );
       $this->cluster_model->update_cluster(array('id_cluster' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE));
    }

    public function cluster_delete($id){
       $this->cluster_model->delete_cluster($id);
       echo json_encode(array("status" => TRUE));
    }

    private function cluster_validate() {
        $data = array();
        $data['error_string'] = array ();
        $data['inputerror'] = array ();
        $data['status'] = TRUE;

        if($this->input->post('aplicacao') == '') {
            $data['inputerror'][] = 'aplicacao';
            $data['error_string'][] = 'O campo aplicacao é obrigatorio';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function teste()
    {
        $lista = $this->cluster_model->consultar_cluster()->result_array();
        vd($lista);
    }


}

/* End of file cluster.php */
/* Location: ./application/controllers/configuracoes/infraestrutura/weblogic/cluster.php */