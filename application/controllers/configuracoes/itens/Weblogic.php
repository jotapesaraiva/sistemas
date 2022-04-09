<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weblogic extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('weblogic_model');
        $this->load->model('contexto_model');
        $this->load->model('tecnologia_model');
        $this->load->model('ambiente_model');
        $this->load->model('servidor_model');
    }

    public function index()
    {
        $css['header_meio'] = load_css(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-select/dist/css/bootstrap-select'), 'global');
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = load_js(array(
                                'plugins/datatables/datatables.min',
                                'plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                                'plugins/bootstrap-select/dist/js/bootstrap-select',
                                'scripts/configuracoes/itens/weblogic'),'global');

        $modal = array(
            'contextos' => $this->contexto_model->listar_contexto(),
            'tecnologias' => $this->tecnologia_model->listar_tecnologia(),
            'ambientes' => $this->ambiente_model->listar_ambiente(),
            'servidors' => $this->servidor_model->listar_servidor());

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>itens</span>', '/configuracoes/itens');
        $this->breadcrumbs->push('<span>Weblogic</span>', '/configuracoes/itens/weblogic');

        $this->load->template('configuracoes/itens/weblogic', array(),$css,$js);

        $this->load->view('modal/modal_weblogic',$modal);

    }


    public function weblogic_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->weblogic_model->select_weblogic();
        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['nome_weblogic'];
            $row[] = $resultado['hostname_servidor'] ." - ". $resultado['ip_servidor'];
            $row[] = $resultado['nome_ambiente'];
            $row[] = $resultado['nome_contexto'];
            $row[] = $resultado['nome_tecnologia'];
            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['id_weblogic']}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['id_weblogic']}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
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

    public function weblogic_add(){
       $this->weblogic_validate();
       $data = array(
                'nome_weblogic'          => $this->input->post('weblogic'),
                'id_ambiente'          => $this->input->post('ambiente'),
                'id_contexto'          => $this->input->post('contexto'),
                'id_tecnologia'        => $this->input->post('tecnologia'),
                'id_servidor'          => $this->input->post('servidor')
           );
       $insert = $this->weblogic_model->save_weblogic($data);
       echo json_encode(array("status" => TRUE));
    }

    public function weblogic_edit($id){
       $data = $this->weblogic_model->edit_weblogic($id);
       echo json_encode($data);
    }

    public function weblogic_update(){
       $this->weblogic_validate();
       $data = array(
                'nome_weblogic'          => $this->input->post('weblogic'),
                'id_ambiente'          => $this->input->post('ambiente'),
                'id_contexto'          => $this->input->post('contexto'),
                'id_tecnologia'        => $this->input->post('tecnologia'),
                'id_servidor'          => $this->input->post('servidor')
           );
       $this->weblogic_model->update_weblogic(array('id_weblogic' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE));
    }

    public function weblogic_delete($id){
       $this->weblogic_model->delete_weblogic($id);
       echo json_encode(array("status" => TRUE));
    }

    private function weblogic_validate() {
        $data = array();
        $data['error_string'] = array ();
        $data['inputerror'] = array ();
        $data['status'] = TRUE;

        if($this->input->post('weblogic') == '') {
            $data['inputerror'][] = 'weblogic';
            $data['error_string'][] = 'O campo weblogic é obrigatorio';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }


}

/* End of file weblogic.php */
/* Location: ./application/controllers/weblogic.php */