<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


    public function __construct() {
      parent::__construct();
      esta_logado();
      $this->load->model('usuarios_model');
      $this->load->model('perfil_model');
    }

    public function index() {
        $this->output->enable_profiler(FALSE);
        $css['header_meio'] = load_css(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-select/dist/css/bootstrap-select'), 'global');
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = load_js(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-select/dist/js/bootstrap-select',
                                'scripts/administracao/site/usuario'),'global');
        $modal['perfils'] = $this->perfil_model->listar_perfil();

          $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
          $this->breadcrumbs->push('<span>Administração</span>', '/administracao');
          $this->breadcrumbs->push('<span>Site</span>', '/administracao/site');
          $this->breadcrumbs->push('<span>usuario</span>', '/administracao/site/usuario');

          $this->load->template('administracao/site/usuario',array(),$css,$js);
          $this->load->view('modal/modal_usuario',$modal);
          // $this->load->view('modal/modal_delete');
      }

      public function usuario_list(){
         // Datatables Variables
         $draw = intval($this->input->get("draw"));
         $start = intval($this->input->get("start"));
         $length = intval($this->input->get("length"));

         $usuarios = $this->usuarios_model->listar_usuario();

         $data = array();

         foreach($usuarios->result() as $usuario) {
             $row = array();
             $row[] = $usuario->nome_usuario;
             $row[] = $usuario->email_usuario;
             $row[] = $usuario->login_usuario;
             $row[] = $usuario->ativo_usuario;
             $row[] = $usuario->nome_perfil;
             if(super_admin()):
             $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$usuario->id_usuario}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                       <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$usuario->id_usuario}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
             else:
             $row[] = 'Sem permissão';
             endif;
             $data[] = $row;
         }

         $output = array(
             "draw" => $draw,
             "recordsTotal" => $usuarios->num_rows(),
             "recordsFiltered" => $usuarios->num_rows(),
             "data" => $data,
         );
         echo json_encode($output);
      }

      public function usuario_add(){
         //$this->_validate();
         $data = array(
                 'nome_usuario' => $this->input->post('nome'),
                 'email_usuario' => $this->input->post('email'),
                 'login_usuario' => $this->input->post('login'),
                 'senha_usuario' => '',
                 'ativo_usuario' => $this->input->post('ativo'),
                 'id_perfil' => $this->input->post('perfil')
             );
         // $insert = $this->usuarios_model->do_insert($data);
         echo json_encode(array("status" => TRUE));
      }

      public function usuario_edit($id){
         $data = $this->usuarios_model->get_byid($id);
         echo json_encode($data->row());
      }

      public function usuario_update(){
         //$this->_validate();
         $data = array(
                 'nome_usuario' => $this->input->post('nome'),
                 'email_usuario' => $this->input->post('email'),
                 'login_usuario' => $this->input->post('login'),
                 'ativo_usuario' => $this->input->post('ativo'),
                 'id_perfil' => $this->input->post('perfil')
             );
         $this->usuarios_model->update_usuario(array('id_usuario' => $this->input->post('id')), $data);
         echo json_encode(array("status" => TRUE));
      }

      public function usuario_delete($id){
         $this->usuarios_model->delete_usuario($id);
         echo json_encode(array("status" => TRUE));
      }

      private function usuario_validate() {
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

/* End of file Usuarios.php */
/* Location: ./application/controllers/configuracoes/Usuarios.php */