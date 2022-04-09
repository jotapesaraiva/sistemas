<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistemas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        esta_logado();
        $this->load->model('link_model');
        $this->load->model('sistema_model');
        $this->load->model('servico_model');
        $this->load->model('cluster_model');
        $this->load->model('servidor_model');
        $this->load->model('datasource_model');
        $this->load->model('managed_server_model');
        $this->load->model('area_negocio_model');
        $this->load->model('negocio_model');
        $this->load->model('documentacao_model');
        $this->load->model('repositorio_model');
        $this->load->model('tipo_sistema_model');
        $this->load->model('weblogic_model');
    }

    public function index()
    {
        $css['header_meio'] = load_css(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min',
                                'plugins/bootstrap-select/dist/css/bootstrap-select'), 'global');
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = load_js(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-select/dist/js/bootstrap-select',
                                'plugins/bootstrap-datepicker/js/bootstrap-datepicker.min',
                                'plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min',
                                'plugins/mustache.min',
                                'scripts/catalogo/sistemas'),'global');
        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Catalogos</span>', '/catalogos');
        $this->breadcrumbs->push('<span>Sistemas</span>', '/catalogo/sistemas');

        $this->load->template('catalogo/sistemas', array(),$css,$js);
        // $this->load->render('catalogo/sistemas');
        $this->load->view('modal/modal_sistema');
        $this->load->view('modal/catalogo_sistemas_modal');
    }

    public function sistema_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->sistema_model->select_sistema();
        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['nome_sistema'];
            $row[] = $resultado['descricao_sistema'];
            $row[] = $resultado['nome_negocio'];
            if(super_admin()):
            $row[] = "<a class='btn blue btn-outline sbold' href='javascript:void(0)' title='Visualizar' onclick=view('{$resultado['id_sistema']}')><i class='glyphicon glyphicon-info-sign'></i> </a>
                      <a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_sistema('{$resultado['id_sistema']}')><i class='glyphicon glyphicon-pencil'></i> </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_sistema('{$resultado['id_sistema']}')><i class='glyphicon glyphicon-trash'></i> </a>";
            else:
            $row[] = "<a class='btn blue btn-outline sbold' href='javascript:void(0)' title='Visualizar' onclick=view('{$resultado['id_sistema']}')><i class='glyphicon glyphicon-info-sign'></i> </a>";
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

    public function sistema_add(){
       // $this->sistema_validate();

       $data = array(
                'nome_sistema'      => $this->input->post('nome'),
                'descricao_sistema' => $this->input->post('descricao'),
                'data_sistema'      => date('Y-m-d', strtotime($this->input->post('data'))),
                'id_tipo_sistema'   => $this->input->post('tipo_sistema'),
                'status_sistema'    => $this->input->post('status')
                // 'id_microservico' => $this->input->post('microservico'),
           );
       $insertData = $this->sistema_model->save_sistema($data);

       if (!empty($this->input->post('url'))) {
         foreach ($this->input->post('url') as $key => $value) {
          $repositorio = $this->input->post('repositorio')[$key];
                  $doc = array (
                        'id_sistema'       => $insertData,
                        'url_documentacao' => $value,
                        'id_repositorio'   => $repositorio,
                  );
         $insertDoc = $this->documentacao_model->save_documentacao($doc);
         }
       }

        if (!empty($this->input->post('negocio'))) {
          foreach ($this->input->post('negocio') as $negocio) {
             $area = array (
                    'id_sistema' => $insertData,
                    'id_negocio' => $negocio,
             );
            $insertArea = $this->area_negocio_model->save_area_negocio($area);
          }
        }

        if (!empty($this->input->post('link_sistema[]'))) {
          foreach ($this->input->post('link_sistema[]') as $link) {

           $link_save = array (
                  'url_link' => $link
           );
          $insertLink = $this->link_model->save_link($link_save);

          $link_sistema =  array (
            'id_sistema' => $insertData,
            'id_link' => $insertLink
          );
          $insertLinkSistema = $this->link_model->save_link_sistema($link_sistema);
        }
      }
         echo json_encode(array ("status" => TRUE));
    }

    public function sistema_edit($id){
       $data['sistema'] = $this->sistema_model->edit_sistema($id);
       $data['area_negocio'] = $this->area_negocio_model->consultar_area_negocio_sistema($id)->result_array();
       $data['documentacao'] = $this->documentacao_model->consultar_documentacao_sistema($id)->result_array();
       $data['link'] = $this->link_model->consultar_link($id)->result_array();

       $data['repositorio'] = $this->repositorio_model->listar_repositorio()->result();
       $data['negocio'] = $this->negocio_model->listar_negocio()->result();
       $data['tipo_sistema'] = $this->tipo_sistema_model->listar_tipo_sistema()->result();
       echo json_encode($data);
    }
//acrescentar mais uma variavel ambiente em quer ser atribuito ao paramentro where na consulta.
    public function sistema_view($id){
       $data['sistema'] = $this->sistema_model->view_sistema($id);
       foreach ($data['sistema'] as $value) {
            $data['documentacao'] = $this->documentacao_model->view_documentacao($value->id_sistema);
            $data['servico_p'] = $this->servico_model->view_servico($value->id_sistema,4);
            $cluster = $this->servico_model->view_servico_cluster($value->id_sistema,4);
       }

        if (empty($cluster)){
          echo json_encode($data);
          // echo "array vazio !!!";
        } else {

           $juntar = array();
            foreach($cluster as $value){
              array_push($juntar, $value->id_cluster);
            }
             $data['datasource_p'] = $this->datasource_model->view_datasource($juntar,4);
             $data['managed_p'] = $this->managed_server_model->view_managed_server($juntar,4);
               // $data['certificado_p'] = $this->certificado_model->view_certificado($juntar,4);

    //################TRANSICAO##############################
           foreach ($data['sistema'] as $value) {
                $data['documentacao'] = $this->documentacao_model->view_documentacao($value->id_sistema);
                $data['servico_t'] = $this->servico_model->view_servico($value->id_sistema,3);
                // $data['weblogic_servico_t'] = $this->servico_model->view_weblogic($value->id_sistema,3);
           }
           foreach ($data['servico_t'] as $value) {
               // $data['cluster_t'] = $this->cluster_model->view_cluster($value->id_cluster,3);
               $data['datasource_t'] = $this->datasource_model->view_datasource($value->id_cluster,3);
               $data['managed_t'] = $this->managed_server_model->view_managed_server($value->id_cluster,3);
               // $data['certificado_t'] = $this->certificado_model->view_certificado($value->id_cluster,3);
           }
    //##############HOMOLAGACAO############################
           foreach ($data['sistema'] as $value) {
                $data['documentacao'] = $this->documentacao_model->view_documentacao($value->id_sistema);
                $data['servico_h'] = $this->servico_model->view_servico($value->id_sistema,2);
                // $data['weblogic_servico_h'] = $this->servico_model->view_weblogic($value->id_sistema,2);
           }
           foreach ($data['servico_h'] as $value) {
               // $data['cluster_h'] = $this->cluster_model->view_cluster($value->id_cluster,2);
               $data['datasource_h'] = $this->datasource_model->view_datasource($value->id_cluster,2);
               $data['managed_h'] = $this->managed_server_model->view_managed_server($value->id_cluster,2);
               // $data['certificado_h'] = $this->certificado_model->view_certificado($value->id_cluster,2);
           }
    //################DESENVOLVIMENTO
           foreach ($data['sistema'] as $value) {
                $data['documentacao'] = $this->documentacao_model->view_documentacao($value->id_sistema);
                $data['servico_d'] = $this->servico_model->view_servico($value->id_sistema,1);
                // $data['weblogic_servico_d'] = $this->servico_model->view_weblogic($value->id_sistema,1);
           }
           foreach ($data['servico_d'] as $value) {
               // $data['cluster_d'] = $this->cluster_model->view_cluster($value->id_cluster,1);
               $data['datasource_d'] = $this->datasource_model->view_datasource($value->id_cluster,1);
               $data['managed_d'] = $this->managed_server_model->view_managed_server($value->id_cluster,1);
               // $data['certificado_d'] = $this->certificado_model->view_certificado($value->id_cluster,1);
           }
           echo json_encode($data);
        }
    }

    public function sistema_modal(){
      // $data['documentacao'] = $this->documentacao_model->modal_documentacao();
      $data['negocio'] = $this->negocio_model->listar_negocio()->result();
      $data['repositorio'] = $this->repositorio_model->listar_repositorio()->result();
      $data['tipo_sistema'] = $this->tipo_sistema_model->listar_tipo_sistema()->result();
      // var_dump($data['documentacao']->result_array());
       echo json_encode($data);
    }

    public function sistema_link_modal(){
      // $data['documentacao'] = $this->documentacao_model->modal_documentacao();
      // $data['negocio'] = $this->negocio_model->listar_negocio()->result();
      $data['repositorio'] = $this->repositorio_model->listar_repositorio()->result();
      // $data['tipo_sistema'] = $this->tipo_sistema_model->listar_tipo_sistema()->result();
      // var_dump($data['documentacao']->result_array());
       echo json_encode($data);
    }

    public function sistema_update(){
       // $this->sistema_validate();

       $insertData = $this->input->post('id');
        $data = array(
                 'nome_sistema'      => $this->input->post('nome'),
                 'descricao_sistema' => $this->input->post('descricao'),
                 'data_sistema'      => date('Y-m-d', strtotime($this->input->post('data'))),
                 'id_tipo_sistema'   => $this->input->post('tipo_sistema'),
                 'status_sistema'    => $this->input->post('status')
                 // 'id_microservico' => $this->input->post('microservico'),
            );
        $this->sistema_model->update_sistema(array('id_sistema' => $this->input->post('id')), $data);
        // deletar todos com id_sistema em documentacao
        $this->documentacao_model->deletar_sistema($this->input->post('id'));
        if (!empty($this->input->post('url'))) {
          foreach ($this->input->post('url') as $key => $value) {
           $repositorio = $this->input->post('repositorio')[$key];
                   $doc = array(
                         'id_sistema'       => $insertData,
                         'url_documentacao' => $value,
                         'id_repositorio'   => $repositorio,
                   );
          // insert tudo de novo
          $insertDoc = $this->documentacao_model->save_documentacao($doc);
          }
        }
        // deletar todos com id id_sistema em area negocio
        $this->area_negocio_model->deletar_sistema($this->input->post('id'));
       if (!empty($this->input->post('negocio'))) {
         foreach ($this->input->post('negocio') as $negocio) {
            $area = array(
                   'id_sistema' => $insertData,
                   'id_negocio' => $negocio,
            );
          // insert tudo de novo
           $insertArea = $this->area_negocio_model->save_area_negocio($area);
         }
       }
       // deletar todos com id_sistema em link relacionados
       $array_link = $this->link_model->consultar_link_sistema($this->input->post('id'))->result_array();
       $this->link_model->delete_link_sistema($this->input->post('id'));
       $this->link_model->delete_link($array_link);

         if (!empty($this->input->post('link_sistema[]'))) {
           foreach ($this->input->post('link_sistema[]') as $Link) {

            $link_save = array(
                   'url_link' => $Link
            );
           $insertLink = $this->link_model->save_link($link_save);

           $link_sistema =  array(
             'id_sistema' => $insertData,
             'id_link' => $insertLink
           );
           $insertLinkSistema = $this->link_model->save_link_sistema($link_sistema);
         }
       }


        echo json_encode(array("status" => TRUE));
    }

    public function sistema_delete($id){
      // deletar todos com id_sistema em link relacionados
      $array_link = $this->link_model->consultar_link_sistema($this->input->post('id'))->result_array();
      //deletar todos com id_sistema em link_sistema
      $this->link_model->delete_link($array_link);
      $this->link_model->delete_link_sistema($this->input->post('id'));
      //deletar todos com id id_sistema em area_negocio
      $this->area_negocio_model->deletar_sistema($id);
      //deletar todos com id id_sistema em documentacao
      $this->documentacao_model->deletar_sistema($id);
      //deletar todos com id id_sistema em sistema
       $this->sistema_model->delete_sistema($id);
       echo json_encode(array("status" => TRUE));
    }

    private function sistema_validate() {
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

    public function teste()
    {
      $id = 34;
      $array_link = $this->link_model->consultar_link_sistema($id)->result_array();
      // $this->link_model->delete_link_sistema($id);
        $id_link = array();
        foreach ($array_link as $value) {
            $id_link[] = $value['id_link'];
        }
      // $this->link_model->delete_link($array_link);
     vd($id_link);
      // pr($array_link);
      // vd($array_link);
      // $sistema = $this->sistema_model->select_sistema()->result_array();
      // $area_negocio = $this->area_negocio_model->listar_area_negocio()->result_array();
      // vd($sistema);
    }

}

/* End of file Sistemas.php */
/* Location: ./application/controllers/catalogos/Sistemas.php */