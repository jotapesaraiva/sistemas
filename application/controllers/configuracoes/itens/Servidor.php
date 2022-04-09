<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servidor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('servidor_model');

        $this->load->model('contexto_model');
        $this->load->model('tecnologia_model');
        $this->load->model('ambiente_model');
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
                                'scripts/configuracoes/itens/servidor'),'global');

        $modal = array(
            'contextos' => $this->contexto_model->listar_contexto(),
            'tecnologias' => $this->tecnologia_model->listar_tecnologia(),
            'ambientes' => $this->ambiente_model->listar_ambiente());

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>itens</span>', '/configuracoes/itens');
        $this->breadcrumbs->push('<span>Servso_servidoridor</span>', '/configuracoes/itens/servidor');

        $this->load->template('configuracoes/itens/servidor', array(),$css,$js);

        $this->load->view('modal/modal_servidor',$modal);
    }

    public function servidor_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->servidor_model->select_servidor();
        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['hostname_servidor'];
            $row[] = $resultado['so_servidor'];
            // $row[] = $resultado['nome_ambiente'];
            // $row[] = $resultado['nome_contexto'];
            // $row[] = $resultado['nome_tecnologia'];
            $row[] = $resultado['ip_servidor'];
            $row[] = $resultado['memoria_servidor'];
            $row[] = $resultado['processador_servidor'];
            $row[] = $resultado['dominio_servidor'];
            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['id_servidor']}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['id_servidor']}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
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

    public function servidor_add(){
       $this->servidor_validate();
       $data = array(
                'id_servidor'          => $this->input->post('id'),
                // 'id_ambiente'          => $this->input->post('ambiente'),
                // 'id_contexto'          => $this->input->post('contexto'),
                // 'id_tecnologia'        => $this->input->post('tecnologia'),
                'so_servidor'    => $this->input->post('so'),
                'ip_servidor'          => $this->input->post('ip'),
                'hostname_servidor'    => $this->input->post('hostname'),
                'memoria_servidor'     => $this->input->post('memoria'),
                'processador_servidor' => $this->input->post('processador'),
                'dominio_servidor'     => $this->input->post('dominio')
           );
       $insert = $this->servidor_model->save_servidor($data);
       echo json_encode(array("status" => TRUE));
    }

    public function servidor_edit($id){
       $data = $this->servidor_model->edit_servidor($id);
       echo json_encode($data);

    }

    public function servidor_update(){
       $this->servidor_validate();

       $data = array(
                'id_servidor'          => $this->input->post('id'),
                // 'id_ambiente'          => $this->input->post('ambiente'),
                // 'id_contexto'          => $this->input->post('contexto'),
                // 'id_tecnologia'        => $this->input->post('tecnologia'),
                'so_servidor'          => $this->input->post('so'),
                'ip_servidor'          => $this->input->post('ip'),
                'hostname_servidor'    => $this->input->post('hostname'),
                'memoria_servidor'     => $this->input->post('memoria'),
                'processador_servidor' => $this->input->post('processador'),
                'dominio_servidor'     => $this->input->post('dominio')
           );
       $this->servidor_model->update_servidor(array('id_servidor' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE));
    }

    public function servidor_delete($id){
       $this->servidor_model->delete_servidor($id);
       echo json_encode(array("status" => TRUE));
    }

    private function servidor_validate() {
        $data = array();
        $data['error_string'] = array ();
        $data['inputerror'] = array ();
        $data['status'] = TRUE;

        if($this->input->post('hostname') == '') {
            $data['inputerror'][] = 'hostname';
            $data['error_string'][] = 'O campo hostname é obrigatorio';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

}

/* End of file Servidor.php */
/* Location: ./application/controllers/infraestrutura/Servidor.php */