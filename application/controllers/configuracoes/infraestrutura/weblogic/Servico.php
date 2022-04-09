<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('servico_model');
        $this->load->model('sistema_model');
        $this->load->model('cluster_model');
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
                                'scripts/configuracoes/infraestrutura/weblogic/servico'),'global');

        $modal = array(
        'sistemas' => $this->sistema_model->listar_sistema(),
        'clusters' => $this->cluster_model->listar_cluster(),
        'weblogics' => $this->weblogic_model->listar_weblogic()
        );

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>Infraestrutura</span>', '/configuracoes/infraestrutura');
        $this->breadcrumbs->push('<span>Weblogic</span>', '/configuracoes/infraestrutura/weblogic');
        $this->breadcrumbs->push('<span>Aplicação</span>', '/configuracoes/infraestrutura/weblogic/servico');

        $this->load->template('configuracoes/infraestrutura/weblogic/servico', array(),$css,$js);

        $this->load->view('modal/modal_servico',$modal);
    }

    public function servico_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->servico_model->select_servico();

        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['nome_sistema'];
            $row[] = $resultado['nome_servico'];
            $row[] = $resultado['versao_servico'];
            $row[] = $resultado['nome_cluster'];
            $row[] = $resultado['nome_weblogic'];
            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['id_servico']}')><i class='glyphicon glyphicon-pencil'></i></a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['id_servico']}')><i class='glyphicon glyphicon-trash'></i></a>";
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

    public function servico_add(){
       $this->servico_validate();
       $data = array(
                'id_sistema'        => $this->input->post('sistema'),
                'nome_servico' => $this->input->post('aplicacao'),
                'versao_servico'    => $this->input->post('versao'),
                'id_weblogic'    => $this->input->post('weblogic')
           );
       $insert = $this->servico_model->save_servico($data);

           $alvo = array(
                   'id_cluster'          => $this->input->post('cluster'),
                   'id_servico'       => $insert
           );
       $salvar = $this->servico_model->save_alvo($alvo);

       echo json_encode(array("status" => TRUE));
    }

    public function servico_edit($id){
        $data['servico'] = $this->servico_model->edit_servico($id);
        $result = array();
        $alvos = $this->servico_model->edit_alvo($id);
        foreach ($alvos as $alvo) {
            array_push($result,$alvo->id_cluster);
        }
        $data['alvo'] = $result;
       echo json_encode($data);
    }

    public function servico_update(){
       $this->servico_validate();
       $data = array(
                'id_sistema'        => $this->input->post('sistema'),
                'nome_servico' => $this->input->post('aplicacao'),
                'versao_servico'    => $this->input->post('versao'),
                'id_weblogic'    => $this->input->post('weblogic')
           );
       $this->servico_model->update_servico(array('id_servico' => $this->input->post('id')), $data);

       $this->cluster_model->delete_alvo($this->input->post('id'));
        $alvo = array(
               'id_cluster'       => $this->input->post('cluster'),
               'id_servico'       => $this->input->post('id')
        );
       $salvar = $this->cluster_model->save_alvo_s($alvo);

       echo json_encode(array("status" => TRUE));
    }

    public function servico_delete($id){
       $this->servico_model->delete_alvo($id);
       $this->servico_model->delete_servico($id);
       echo json_encode(array("status" => TRUE));
    }

    private function servico_validate() {
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
        // $result = $this->sistema_model->listar_sistema();
        // foreach ($result->result_array() as $value) {
        //     echo $value['nome_sistema'];
        //     $servicos = $this->servico_model->view_servico($value['id_sistema']);
        //     var_dump($servicos);
        //     if($servicos[0]['nome_cluster']  != null)
        //         echo $servicos[0]['nome_cluster'];
        //     foreach ($servicos as $servico) {
        //         echo $servico['nome_servico'];
        //     }
        //     if($servicos[0]['documentacao_servico']  != null)
        //         echo $servicos[0]['documentacao_servico'];
        // }
        // var_dump($result->result());
        $resultados = $this->servico_model->select_servico();
        vd($resultados->result_array());
    }

}

/* End of file Servico.php */
/* Location: ./application/controllers/catalogo/infraestrutura/Servico.php */