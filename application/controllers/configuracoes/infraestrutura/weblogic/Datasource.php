                                                                                                                                                                                          <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasource extends CI_Controller {

    public function __construct() {
        parent::__construct();
        esta_logado();
        $this->load->model('datasource_model');
        $this->load->model('cluster_model');
        $this->load->model('managed_server_model');
        $this->load->model('alvo_datasource_model');
        $this->load->model('weblogic_model');
    }

    public function index(){
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
                                    'scripts/configuracoes/infraestrutura/weblogic/datasource'),'global');
            $modal = array(
            'clusters' => $this->cluster_model->listar_cluster(),
            'manageds' => $this->managed_server_model->select_managed_server(),
            'weblogics' => $this->weblogic_model->listar_weblogic()
            );

            $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
            $this->breadcrumbs->push('<span>Configuraçóes</span>', '/configuracoes;');
            $this->breadcrumbs->push('<span>Infraestrutura</span>', '/configuracoes/infraestrutura');
            $this->breadcrumbs->push('<span>Weblogic</span>', '/configuracoes/infraestrutura/weblogic');
            $this->breadcrumbs->push('<span>Datasource</span>', '/configuracoes/infraestrutura/weblogic/datasource');

            $this->load->template('configuracoes/infraestrutura/weblogic/datasource',array(),$css,$js);
            $this->load->view('modal/modal_datasource',$modal);

    }

     public function datasource_list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $datasources = $this->datasource_model->list_datasource();

        $data = array();

        foreach($datasources->result() as $datasource) {
            $row = array();
            $row[] = $datasource->nome_datasource;
            $row[] = $datasource->nome_weblogic;
            $row[] = $datasource->usuario_datasource;
            $row[] = $datasource->jndi_datasource;
            $row[] = $datasource->tipo_datasource;
            $row[] = $datasource->string_url_datasource;
            $row[] = $datasource->nome_cluster;
            if(super_admin()):
            $row[] = "<a class='btn yellow-mint btn-outline sbold' href='javascript:void(0)' title='Editar' onclick=edit_person('{$datasource->id_datasource}')><i class='glyphicon glyphicon-pencil'></i></a>
                      <a class='btn red-mint btn-outline sbold' href='javascript:void(0)' title='Deletar' onclick=delete_person('{$datasource->id_datasource}')><i class='glyphicon glyphicon-trash'></i></a>";
            else:
                $row[] = 'Sem permissão';
            endif;
            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $datasources->num_rows(),
            "recordsFiltered" => $datasources->num_rows(),
            "data" => $data,
        );
        echo json_encode($output);
     }

     public function datasource_add(){
        $this->datasource_validate();
        $data = array(
                'nome_datasource'       => $this->input->post('nome'),
                'id_weblogic'           => $this->input->post('weblogic'),
                'tipo_datasource'       => $this->input->post('tipo'),
                'jndi_datasource'       => $this->input->post('jndi'),
                'usuario_datasource'    => $this->input->post('usuario'),
                'string_url_datasource' => $this->input->post('string')
            );
        $insert = $this->datasource_model->save_datasource($data);
        $clusters = $this->input->post('cluster[]');
        if($clusters != ''){
            foreach ($clusters as $cluster) {
                $alvo = array(
                        'id_cluster'          => $cluster,
                        'id_datasource'       => $insert
                );
            $salvar = $this->datasource_model->save_alvo($alvo);
            }
        }
        echo json_encode(array("status" => TRUE));
     }

     public function datasource_edit($id) {
        $data['conexao'] = $this->datasource_model->edit_datasource($id);
        $result = array();
        $alvos = $this->datasource_model->edit_alvo($id);
        foreach ($alvos as $alvo) {
            array_push($result,$alvo->id_cluster);
        }
        $data['alvo'] = $result;
        echo json_encode($data);
     }

     public function datasource_update(){
        $this->datasource_validate();
        $data = array(
            'nome_datasource'       => $this->input->post('nome'),
            'id_weblogic'           => $this->input->post('weblogic'),
            'tipo_datasource'       => $this->input->post('tipo'),
            'jndi_datasource'       => $this->input->post('jndi'),
            'usuario_datasource'    => $this->input->post('usuario'),
            'string_url_datasource' => $this->input->post('string')
            );
        $this->datasource_model->update_datasource(array('id_datasource' => $this->input->post('id')), $data);
        //deletar todos os casos
        $this->datasource_model->delete_alvo($this->input->post('id'));
        //salvar novamente
        $clusters = $this->input->post('cluster[]');
        foreach ($clusters as $cluster) {
            $alvo = array(
                    'id_cluster'          => $cluster,
                    'id_datasource'       => $this->input->post('id')
            );
        $salvar = $this->datasource_model->save_alvo($alvo);
        }
        echo json_encode(array("status" => TRUE));

     }

     public function datasource_delete($id){
        $this->datasource_model->delete_alvo($id);
        $this->datasource_model->delete_datasource($id);
        echo json_encode(array("status" => TRUE));
     }

     private function datasource_validate() {
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
        $this->load->helper('array');
        $id = 4;
        // $data = array();
        // $data['data'] = $this->datasource_model->edit_datasource($id);
        // $data['alvo'] = $this->datasource_model->edit_alvo($id);
        // echo json_encode($data);
        $data = array();
        $alvos = $this->datasource_model->edit_alvo($id);
        foreach ($alvos as $alvo) {
            array_push($data,$alvo->id_cluster);
        }
        $result['alvo'] = $data;
        echo json_encode($result);
     }
}

/* End of file Datasource.php */
/* Location: ./application/controllers/catalogo/infraestrutura/Datasource.php */