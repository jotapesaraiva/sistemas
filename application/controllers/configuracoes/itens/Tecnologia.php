<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnologia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        esta_logado();
        $this->load->helper('alert_helper');
        $this->load->helper('username');
        $this->load->model('tecnologia_model');
    }

    public function index(){
            $this->output->enable_profiler(FALSE);
            $css['header_meio'] = load_css(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
            $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

            $js['footer_meio'] = load_js(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap', 'scripts/configuracoes/itens/tecnologia'),'global');

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes;');
            $this->breadcrumbs->push('<span>Itens</span>', '/configuracoes/itens');
            $this->breadcrumbs->push('<span>Tecnologia</span>', '/configuracoes/itens/tecnologia');

            $this->load->template('configuracoes/itens/tecnologia',array(),$css,$js);
            $this->load->view('modal/modal_form');

         }

     public function tecnologia_list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $tecnologias = $this->tecnologia_model->listar_tecnologia();

        $data = array();

        foreach($tecnologias->result_array() as $tecnologia) {
            $row = array();

            $row[] = $tecnologia['id_tecnologia'];
            $row[] = $tecnologia['nome_tecnologia'];
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$tecnologia['id_tecnologia']}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$tecnologia['id_tecnologia']}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $tecnologias->num_rows(),
            "recordsFiltered" => $tecnologias->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
     }

     public function tecnologia_add(){
        $this->tecnologia_validate();
        $data = array(
                'nome_tecnologia' => $this->input->post('nome'),
            );
        $insert = $this->tecnologia_model->save_tecnologia($data);
        echo json_encode(array("status" => TRUE));
     }

     public function tecnologia_edit($id){
        $data = $this->tecnologia_model->edit_tecnologia($id);
        echo json_encode($data);
     }

     public function tecnologia_update(){
        $this->tecnologia_validate();
        $data = array(
                'nome_tecnologia' => $this->input->post('nome'),
            );
        $this->tecnologia_model->update_tecnologia(array('id_tecnologia' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
     }

     public function tecnologia_delete($id){
        $this->tecnologia_model->delete_tecnologia($id);
        echo json_encode(array("status" => TRUE));
     }

     private function tecnologia_validate() {
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

/* End of file Tecnologia.php */
/* Location: ./application/controllers/configuracoes/itens/Tecnologia.php */