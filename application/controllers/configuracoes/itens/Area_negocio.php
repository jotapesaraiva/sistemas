<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Area_negocio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        esta_logado();
        $this->load->model('area_negocio_model');
    }

    public function index(){
            $this->output->enable_profiler(FALSE);
            $css['header_meio'] = load_css(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap'), 'global');
            $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

            $js['footer_meio'] = load_js(array('plugins/datatables/datatables.min', 'plugins/datatables/plugins/bootstrap/datatables.bootstrap', 'scripts/configuracoes/itens/area_negocio'),'global');

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes;');
            $this->breadcrumbs->push('<span>Itens</span>', '/configuracoes/itens');
            $this->breadcrumbs->push('<span>Area de Negocio</span>', '/configuracoes/itens/area_negocio');

            $this->load->template('configuracoes/itens/area_negocio',array(),$css,$js);
            $this->load->view('modal/modal_form');

         }

     public function area_negocio_list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $area_negocios = $this->area_negocio_model->listar_negocio();

        $data = array();

        foreach($area_negocios->result_array() as $area_negocio) {
            $row = array();

            $row[] = $area_negocio['id_negocio'];
            $row[] = $area_negocio['nome_negocio'];
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$area_negocio['id_negocio']}')><i class='glyphicon glyphicon-pencil'></i> </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$area_negocio['id_negocio']}')><i class='glyphicon glyphicon-trash'></i> </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $area_negocios->num_rows(),
            "recordsFiltered" => $area_negocios->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
     }

     public function area_negocio_add(){
        $this->area_negocio_validate();
        $data = array(
                'nome_negocio' => $this->input->post('nome'),
            );
        $insert = $this->area_negocio_model->save_area_negocio($data);
        echo json_encode(array("status" => TRUE));
     }

     public function area_negocio_edit($id){
        $data = $this->area_negocio_model->edit_area_negocio($id);
        echo json_encode($data);
     }

     public function area_negocio_update(){
        $this->area_negocio_validate();
        $data = array(
                'nome_negocio' => $this->input->post('nome'),
            );
        $this->area_negocio_model->update_area_negocio(array('id_negocio' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
     }

     public function area_negocio_delete($id){
        $this->area_negocio_model->delete_area_negocio($id);
        echo json_encode(array("status" => TRUE));
     }

     private function area_negocio_validate() {
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

/* End of file Area_negocio.php */
/* Location: ./application/controllers/configuracoes/itens/Area_negocio.php */