<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_certificado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        esta_logado();
        $this->load->helper('alert_helper');
        $this->load->helper('username');
        $this->load->model('tipo_certificado_model');
    }

    public function index(){
            $this->output->enable_profiler(FALSE);
            $css['header_meio'] = load_css(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
            $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

            $js['footer_meio'] = load_js(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap', 'scripts/configuracoes/itens/tipo_certificado'),'global');

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes;');
            $this->breadcrumbs->push('<span>Itens</span>', '/configuracoes/itens');
            $this->breadcrumbs->push('<span>Tipo Certificado</span>', '/configuracoes/itens/tipo_certificado');

            $this->load->template('configuracoes/itens/tipo_certificado',array(),$css,$js);
            $this->load->view('modal/modal_form');

         }

     public function tipo_certificado_list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $tipo_certificados = $this->tipo_certificado_model->listar_tipo_certificado();

        $data = array();

        foreach($tipo_certificados->result_array() as $tipo_certificado) {
            $row = array();

            $row[] = $tipo_certificado['id_tipo_certificado'];
            $row[] = $tipo_certificado['nome_tipo_certificado'];
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$tipo_certificado['id_tipo_certificado']}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$tipo_certificado['id_tipo_certificado']}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $tipo_certificados->num_rows(),
            "recordsFiltered" => $tipo_certificados->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
     }

     public function tipo_certificado_add(){
        $this->tipo_certificado_validate();
        $data = array(
                'nome_tipo_certificado' => $this->input->post('nome'),
            );
        $insert = $this->tipo_certificado_model->save_tipo_certificado($data);
        echo json_encode(array("status" => TRUE));
     }

     public function tipo_certificado_edit($id){
        $data = $this->tipo_certificado_model->edit_tipo_certificado($id);
        echo json_encode($data);
     }

     public function tipo_certificado_update(){
        $this->tipo_certificado_validate();
        $data = array(
                'nome_tipo_certificado' => $this->input->post('nome'),
            );
        $this->tipo_certificado_model->update_tipo_certificado(array('id_tipo_certificado' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
     }

     public function tipo_certificado_delete($id){
        $this->tipo_certificado_model->delete_tipo_certificado($id);
        echo json_encode(array("status" => TRUE));
     }

     private function tipo_certificado_validate() {
         $data = array();
         $data['error_string'] = array ();
         $data['inputerror'] = array ();
         $data['status'] = TRUE;

         if($this->input->post('nome') == '') {
             $data['inputerror'][] = 'nome';
             $data['error_string'][] = 'O campo nome é obrigatorio';
             $data['status'] = FALSE;
         }

         if($data['status'] === FALSE) {
             echo json_encode($data);
             exit();
         }
     }

}

/* End of file Tipo_certificado.php */
/* Location: ./application/controllers/configuracoes/itens/Tipo_certificado.php */