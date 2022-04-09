<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managed_server extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('managed_server_model');
        $this->load->model('servidor_model');
        $this->load->model('weblogic_model');
        $this->load->model('servico_model');
        $this->load->model('certificado_model');
        $this->load->model('cluster_model');
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
                                'scripts/configuracoes/infraestrutura/weblogic/managed_server'),'global');

        $modal['servidors'] = $this->servidor_model->listar_servidor();
        $modal['certificados'] = $this->certificado_model->listar_certificado();
        $modal['servicos'] = $this->servico_model->listar_servico();
        $modal['weblogics'] = $this->weblogic_model->listar_weblogic();
        $modal['clusters'] = $this->cluster_model->listar_cluster();

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>Infraestrutura</span>', '/configuracoes/infraestrutura');
        $this->breadcrumbs->push('<span>Weblogic</span>', '/configuracoes/infraestrutura/weblogic');
        $this->breadcrumbs->push('<span>Managed Server</span>', '/configuracoes/infraestrutura/weblogic/managed_server');

        $this->load->template('configuracoes/infraestrutura/weblogic/managed_server', array(),$css,$js);

        $this->load->view('modal/modal_managed_server',$modal);
    }

    public function managed_server_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->managed_server_model->consultar_managed_server();
        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['nome_cluster'];
            $row[] = $resultado['nome_managed_server'];
            $row[] = $resultado['nome_weblogic'];
            $row[] = $resultado['porta_managed_server'];
            $row[] = $resultado['versao_java_managed_server'];
            $row[] = $resultado['memoria_managed_server'];
            $row[] = $resultado['argumento_managed_server'];
            if ($resultado['status_managed_server'] == '1'){
             $row[] = '<span class="label label-sm label-info"> Running. </span>';
            } else {
             $row[] = '<span class="label label-sm label-danger"> Shutdown. </span>';
            }
            // $row[] = $resultado['status_managed_server'];
            $row[] = $resultado['id_certificado'];

            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['id_managed_server']}')><i class='glyphicon glyphicon-pencil'></i></a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['id_managed_server']}')><i class='glyphicon glyphicon-trash'></i></a>";
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

    public function managed_server_add(){
       // $this->managed_server_validate();
       if($this->input->post('status') == 'on') {
         $status = '1';
       } else {
         $status = '0';
       }
       $data = array(
                'id_weblogic'            => $this->input->post('weblogic'),
                'id_certificado'         => $this->input->post('certificado'),
                'nome_managed_server'           => $this->input->post('managed_server'),
                'id_cluster'                    => $this->input->post('cluster'),
                'porta_managed_server'          => $this->input->post('porta'),
                'versao_java_managed_server'    => $this->input->post('versao_java'),
                'memoria_managed_server'        => $this->input->post('memoria'),
                'argumento_managed_server'      => $this->input->post('argumento'),
                'status_managed_server'         => $status

           );
       $insert = $this->managed_server_model->save_managed_server($data);
       echo json_encode(array("status" => TRUE));
    }

    public function managed_server_edit($id){
       $data = $this->managed_server_model->edit_managed_server($id);
       echo json_encode($data);
    }

    public function managed_server_update(){
       // $this->managed_server_validate();
       if($this->input->post('status') == 'on') {
         $status = '1';
       } else {
         $status = '0';
       }

       $data = array(
                'id_weblogic'            => $this->input->post('weblogic'),
                'id_certificado'         => $this->input->post('certificado'),
                'nome_managed_server'           => $this->input->post('managed_server'),
                'id_cluster'                    => $this->input->post('cluster'),
                'porta_managed_server'          => $this->input->post('porta'),
                'versao_java_managed_server'    => $this->input->post('versao_java'),
                'memoria_managed_server'        => $this->input->post('memoria'),
                'argumento_managed_server'      => $this->input->post('argumento'),
                'status_managed_server'         => $status
           );
       $this->managed_server_model->update_managed_server(array('id_managed_server' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE));
    }

    public function managed_server_delete($id){
       $this->managed_server_model->delete_managed_server($id);
       echo json_encode(array("status" => TRUE));
    }

    private function managed_server_validate() {
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


}

/* End of file managed_server.php */
/* Location: ./application/controllers/configuracoes/infraestrutura/weblogic/managed_server.php */