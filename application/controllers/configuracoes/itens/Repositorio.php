<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repositorio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        esta_logado();
        $this->load->helper('alert_helper');
        $this->load->helper('username');
        $this->load->model('repositorio_model');
    }

    public function index(){
            $this->output->enable_profiler(FALSE);
            $css['header_meio'] = load_css(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
            $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

            $js['footer_meio'] = load_js(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap', 'scripts/configuracoes/itens/repositorio'),'global');

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes;');
            $this->breadcrumbs->push('<span>Itens</span>', '/configuracoes/itens');
            $this->breadcrumbs->push('<span>Repositorio</span>', '/configuracoes/itens/repositorio');

            $this->load->template('configuracoes/itens/repositorio',array(),$css,$js);
            $this->load->view('modal/modal_form');

         }

     public function repositorio_list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $repositorios = $this->repositorio_model->listar_repositorio();

        $data = array();

        foreach($repositorios->result() as $repositorio) {
            $row = array();
            $row[] = $repositorio->id_repositorio;
            $row[] = $repositorio->nome_repositorio;
            // if(admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$repositorio->id_repositorio}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                                              <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$repositorio->id_repositorio}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
            // else:
            //     $row[] = 'Sem permissão';
            // endif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $repositorios->num_rows(),
            "recordsFiltered" => $repositorios->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
     }

     public function repositorio_add(){
        $this->repositorio_validate();
        $data = array(
                'nome_repositorio' => $this->input->post('nome'),
            );
        $insert = $this->repositorio_model->save_repositorio($data);
        echo json_encode(array("status" => TRUE));
     }

     public function repositorio_edit($id){
        $data = $this->repositorio_model->edit_repositorio($id);
        echo json_encode($data);
     }

     public function repositorio_update(){
        $this->repositorio_validate();
        $data = array(
                'nome_repositorio' => $this->input->post('nome'),
            );
        $this->repositorio_model->update_repositorio(array('id_repositorio' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
     }

     public function repositorio_delete($id){
        $this->repositorio_model->delete_repositorio($id);
        echo json_encode(array("status" => TRUE));
     }

     private function repositorio_validate() {
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

/* End of file Repositorio.php */
/* Location: ./application/controllers/configuracoes/itens/Repositorio.php */