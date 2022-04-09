<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contexto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        esta_logado();
        $this->load->helper('alert_helper');
        $this->load->helper('username');
        $this->load->model('contexto_model');
    }

    public function index(){
            $this->output->enable_profiler(FALSE);
            $css['header_meio'] = load_css(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
            $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

            $js['footer_meio'] = load_js(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap', 'scripts/configuracoes/itens/contexto'),'global');

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes;');
            $this->breadcrumbs->push('<span>Itens</span>', '/configuracoes/itens');
            $this->breadcrumbs->push('<span>Contexto</span>', '/configuracoes/itens/contexto');

            $this->load->template('configuracoes/itens/contexto',array(),$css,$js);
            $this->load->view('modal/modal_form');

         }

     public function contexto_list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $contextos = $this->contexto_model->listar_contexto();

        $data = array();

        foreach($contextos->result() as $contexto) {
            $row = array();
            $row[] = $contexto->id_contexto;
            $row[] = $contexto->nome_contexto;
            // if(admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$contexto->id_contexto}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                                  <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$contexto->id_contexto}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
            // else:
            //     $row[] = 'Sem permissão';
            // endif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $contextos->num_rows(),
            "recordsFiltered" => $contextos->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
     }

     public function contexto_add(){
        $this->contexto_validate();
        $data = array(
                'nome_contexto' => $this->input->post('nome'),
            );
        $insert = $this->contexto_model->save_contexto($data);
        echo json_encode(array("status" => TRUE));
     }

     public function contexto_edit($id){
        $data = $this->contexto_model->edit_contexto($id);
        echo json_encode($data);
     }

     public function contexto_update(){
        $this->contexto_validate();
        $data = array(
                'nome_contexto' => $this->input->post('nome'),
            );
        $this->contexto_model->update_contexto(array('id_contexto' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
     }

     public function contexto_delete($id){
        $this->contexto_model->delete_contexto($id);
        echo json_encode(array("status" => TRUE));
     }

     private function contexto_validate() {
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

/* End of file Contexto.php */
/* Location: ./application/controllers/configuracoes/itens/Contexto.php */