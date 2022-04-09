<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria extends CI_Controller {

    public function __construct(){
        parent::__construct();
        esta_logado();
        $this->load->model('auditoria_model');
    }

    public function index(){
        $css['header_meio'] = load_css(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = load_js(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'scripts/administracao/ferramentas/auditoria'),'global');

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Catalogos</span>', '/catalogos');
        $this->breadcrumbs->push('<span>Sistemas</span>', '/catalogo/sistemas');

        $this->load->template('administracao/ferramentas/auditoria', '',$css,$js);

            // set_tema('footerinc', load_js(array('dataTable', 'table')), FALSE);
            // set_tema('titulo', 'Registro de auditoria');
            // set_tema('conteudo', load_modulo('auditoria', 'gerenciar'));
    }

        // $query = $this->auditoria_->get_all($limite)->result();
        // foreach ($query as  $linha):
        //     printf('<td>%s</td>', $linha->usuario_auditoria);
        //     printf('<td>%s</td>', date('d/m/Y H:i:s', strtotime($linha->data_hora_auditoria)));
        //     printf('<td>%s</td>', '<span data-tooltip aria-haspopup="true" class="has-tip tip-top radius round" title=" '.$linha->query_auditoria.' ">'.$linha->operacao_auditoria.'</span>');
        //     printf('<td>%s</td>', $linha->observacao_auditoria);
        // endforeach;

    public function auditoria_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->auditoria_model->get_all();
        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['usuario_auditoria'];
            $row[] = date('d/m/Y H:i:s', strtotime($resultado['data_hora_auditoria']));
            $row[] = "<span data-tooltip aria-haspopup='true' class='has-tip tip-top radius round' title=' {$resultado['query_auditoria']} '> {$resultado['operacao_auditoria']}</span>";
            $row[] = $resultado['observacao_auditoria'];

            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['id_auditoria']}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['id_auditoria']}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
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

    public function auditoria_add(){
       // $this->auditoria_validate();
       $data = array(
                'id_servidor'            => $this->input->post('servidor'),
                'id_certificado'         => $this->input->post('certificado'),
                'nome_auditoria'           => $this->input->post('auditoria'),
                'managed_server_auditoria' => $this->input->post('managed_server'),
                'porta_auditoria'          => $this->input->post('porta'),
                'versao_java_auditoria'    => $this->input->post('versao_java'),
                'memoria_auditoria'        => $this->input->post('memoria'),
                'argumento_auditoria'      => $this->input->post('argumento'),
                'status_auditoria'         => $this->input->post('status')

           );
       $insert = $this->auditoria_model->save_auditoria($data);
       echo json_encode(array("status" => TRUE));
    }

    public function auditoria_edit($id){
       $data = $this->auditoria_model->edit_auditoria($id);
       echo json_encode($data);
    }

    public function auditoria_update(){
       // $this->auditoria_validate();
       $data = array(
                'id_servidor'            => $this->input->post('servidor'),
                'id_certificado'         => $this->input->post('certificado'),
                'nome_auditoria'           => $this->input->post('auditoria'),
                'managed_server_auditoria' => $this->input->post('managed_server'),
                'porta_auditoria'          => $this->input->post('porta'),
                'versao_java_auditoria'    => $this->input->post('versao_java'),
                'memoria_auditoria'        => $this->input->post('memoria'),
                'argumento_auditoria'      => $this->input->post('argumento'),
                'status_auditoria'         => $this->input->post('status')
           );
       $this->auditoria_model->update_auditoria(array('id_auditoria' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE));
    }

    public function auditoria_delete($id){
       $this->auditoria_model->delete_auditoria($id);
       echo json_encode(array("status" => TRUE));
    }

    private function auditoria_validate() {
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

/* End of file Auditoria.php */
/* Location: ./application/controllers/ferramentas/Auditoria.php */