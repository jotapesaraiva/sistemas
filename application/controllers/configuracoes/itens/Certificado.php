<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificado extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('certificado_model');
        $this->load->model('tipo_certificado_model');
        $this->load->helper('date');
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
                                'plugins/bootstrap-datepicker/js/bootstrap-datepicker.min',
                                'plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min',
                                'plugins/bootstrap-select/dist/js/bootstrap-select',
                                'scripts/configuracoes/itens/certificado'),'global');
        // $js['footer_meio'] .= load_js(array('scripts/components-date-time-pickers'), 'pages');

        $modal = array('tipo_certificados' => $this->tipo_certificado_model->listar_tipo_certificado());

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Configurações</span>', '/configuracoes');
        $this->breadcrumbs->push('<span>itens</span>', '/configuracoes/itens');
        $this->breadcrumbs->push('<span>certificados</span>', '/configuracoes/itens/certificado');

        $this->load->template('configuracoes/itens/certificado', array(),$css,$js);
        $this->load->view('modal/modal_certificado',$modal);
    }

    public function certificado_list() {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $resultados = $this->certificado_model->select_certificado();
        $data = array();
        foreach($resultados->result_array() as $resultado){
            $row = array();

            $row[] = $resultado['nome_certificado'];
            $row[] = $resultado['nome_tipo_certificado'];
            $row[] = $resultado['url_certificado'];
            $row[] = nice_date($resultado['validade_certificado'], 'd-m-Y');
            $row[] = $resultado['diretorio_certificado'];
            $row[] = $resultado['documentacao_certificado'];
            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$resultado['id_certificado']}')><i class='glyphicon glyphicon-pencil'></i> Editar </a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$resultado['id_certificado']}')><i class='glyphicon glyphicon-trash'></i> Deletar </a>";
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

    public function certificado_add(){
       $this->certificado_validate();
       $data = array(
                'id_tipo_certificado' => $this->input->post('tipo'),
                'documentacao_certificado' => $this->input->post('documentacao'),
                'nome_certificado' => $this->input->post('nome'),
                'url_certificado' => $this->input->post('url'),
                'validade_certificado' => nice_date($this->input->post('validade'), 'Y-m-d'),
                'diretorio_certificado' => $this->input->post('diretorio'),
           );
       $insert = $this->certificado_model->save_certificado($data);
       echo json_encode(array("status" => TRUE));
    }

    public function certificado_edit($id){
       $data = $this->certificado_model->edit_certificado($id);
       echo json_encode($data);
    }

    public function certificado_update(){
       $this->certificado_validate();
       $data = array(
                'id_tipo_certificado' => $this->input->post('tipo'),
                'documentacao_certificado' => $this->input->post('documentacao'),
                'nome_certificado' => $this->input->post('nome'),
                'url_certificado' => $this->input->post('url'),
                'validade_certificado' => $this->input->post('validade'),
                'diretorio_certificado' => $this->input->post('diretorio'),
           );
       $this->certificado_model->update_certificado(array('id_certificado' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE));
    }

    public function certificado_delete($id){
       $this->certificado_model->delete_certificado($id);
       echo json_encode(array("status" => TRUE));
    }

    private function certificado_validate() {
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

/* End of file Certificado.php */
/* Location: ./application/controllers/catalogo/infraestrutura/Certificado.php */