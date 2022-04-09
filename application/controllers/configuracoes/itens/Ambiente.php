<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambiente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        esta_logado();
        $this->load->helper('alert_helper');
        $this->load->helper('username');
        $this->load->model('ambiente_model');
    }

    public function index(){
            $this->output->enable_profiler(FALSE);
            $css['header_meio'] = load_css(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
            $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

            $js['footer_meio'] = load_js(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap', 'scripts/configuracoes/itens/tables'),'global');

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Configuraçóes</span>', '/configuracoes;');
            $this->breadcrumbs->push('<span>Itens</span>', '/configuracoes/itens');
            $this->breadcrumbs->push('<span>Ambiente</span>', '/configuracoes/itens/ambiente');

            $this->load->template('configuracoes/itens/ambiente',array(),$css,$js);
            $this->load->view('modal/modal_form');

         }

     public function ambiente_list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $ambientes = $this->ambiente_model->listar_ambiente();

        $data = array();

        foreach($ambientes->result() as $ambiente) {
            $row = array();
            $row[] = $ambiente->id_ambiente;
            $row[] = $ambiente->nome_ambiente;
            // if(admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$ambiente->id_ambiente}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$ambiente->id_ambiente}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
            // else:
            //     $row[] = 'Sem permissão';
            // endif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $ambientes->num_rows(),
            "recordsFiltered" => $ambientes->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
     }

     public function ambiente_add(){
        $this->ambiente_validate();
        $data = array(
                'nome_ambiente' => $this->input->post('nome'),
            );
        $insert = $this->ambiente_model->save_ambiente($data);
        echo json_encode(array("status" => TRUE));
     }

     public function ambiente_edit($id){
        $data = $this->ambiente_model->edit_ambiente($id);
        echo json_encode($data);
     }

     public function ambiente_update(){
        $this->ambiente_validate();
        $data = array(
                'nome_ambiente' => $this->input->post('nome'),
            );
        $this->ambiente_model->update_ambiente(array('id_ambiente' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
     }

     public function ambiente_delete($id){
        $this->ambiente_model->delete_ambiente($id);
        echo json_encode(array("status" => TRUE));
     }

     private function ambiente_validate() {
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

/* End of file Ambiente.php */
/* Location: ./application/controllers/configuracoes/itens/Ambiente.php */