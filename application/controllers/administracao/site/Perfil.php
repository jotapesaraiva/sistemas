<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct() {
      parent::__construct();
      esta_logado();
      $this->load->model('perfil_model');
    }

    public function index() {
        $css['header_meio'] = load_css(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = load_js(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'scripts/administracao/site/perfil'),'global');

          $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
          $this->breadcrumbs->push('<span>Administração</span>', '/administracao');
          $this->breadcrumbs->push('<span>Site</span>', '/administracao/site');
          $this->breadcrumbs->push('<span>Perfil</span>', '/administracao/site/perfil');

          $this->load->template('administracao/site/perfil',array(),$css,$js);
          $this->load->view('modal/modal_form');
          // $this->load->view('modal/modal_delete');
      }

      public function perfil_list(){
         // Datatables Variables
         $draw = intval($this->input->get("draw"));
         $start = intval($this->input->get("start"));
         $length = intval($this->input->get("length"));

         $perfils = $this->perfil_model->listar_perfil();

         $data = array();

         foreach($perfils->result() as $perfil) {
             $row = array();
             $row[] = $perfil->nome_perfil;
             // if(acesso_super_admin()):
             $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$perfil->id_perfil}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                       <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$perfil->id_perfil}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
             // else:
             // $row[] = 'Sem permissão';
             // endif;
             $data[] = $row;
         }

         $output = array(
             "draw" => $draw,
             "recordsTotal" => $perfils->num_rows(),
             "recordsFiltered" => $perfils->num_rows(),
             "data" => $data,
         );
         echo json_encode($output);
      }

      public function perfil_add(){
         //$this->_validate();
         $data = array(
                 'nome_perfil' => $this->input->post('nome')
             );
         $insert = $this->perfil_model->save_perfil($data);
         echo json_encode(array("status" => TRUE));
      }

      public function perfil_edit($id){
         $data = $this->perfil_model->edit_perfil($id);
         echo json_encode($data);
      }

      public function perfil_update(){
         //$this->_validate();
         $data = array(
                 'nome_perfil' => $this->input->post('nome')
             );
         $this->perfil_model->update_perfil(array('id_perfil' => $this->input->post('id')), $data);
         echo json_encode(array("status" => TRUE));
      }

      public function perfil_delete($id){
         $this->perfil_model->delete_perfil($id);
         echo json_encode(array("status" => TRUE));
      }

      private function perfil_validate() {
          $data = array();
          $data['error_string'] = array();
          $data['inputerror'] = array();
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

/* End of file Perfil.php */
/* Location: ./application/controllers/administracao/site/Perfil.php */