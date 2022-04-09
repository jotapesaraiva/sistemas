<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper('alert_helper');
        $this->load->helper('assets_helper');
        $this->load->model('usuarios_model', 'usuarios');
        $this->load->library('Auth_AD');
    }

    public function index(){
        $this->output->enable_profiler(FALSE);
        $this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required|min_length[4]|strtolower');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[4]|strtolower');
        //validação do formulario
        if($this->form_validation->run()==TRUE):
            $usuario = $this->input->post('usuario', TRUE);
            $senha = $this->input->post('senha', TRUE);
            $redirect = $this->input->post('redirect', TRUE);
            // verifica autenticação do usuario no AD.
            if ($this->auth_ad->login($usuario, $senha) == TRUE) :
            // if($this->usuarios->do_login($usuario, $senha) == TRUE):
                $save = array(
                        'login_usuario' => $usuario,
                        'senha_usuario' => md5($senha),
                        'nome_usuario' => $this->session->userdata('displayname'),
                        'email_usuario' => $this->session->userdata('mail'),
                        'ativo_usuario' => 1,
                        'id_perfil' => 1);
                //salva/atualiza o usuario no banco local.
                $alterado = $this->usuarios->insert_usuario($save);
                // registando as ações para auditoria.
                auditoria('Login no sistema', 'Usuario "'.$usuario.'" fez login no sistema.');
                set_msg('loginOk','Logado com sucesso no sistema !!!','sucesso');
                if ($redirect != ' '):
                    redirect($redirect);
                else:
                    redirect('catalogos');
                endif;
            else:
                $query = $this->usuarios->get_bylogin($usuario)->row();
                if (empty($query)):
                    set_msg('errologin', 'Usuário "'.$usuario.'" inexistente ', 'erro');
                elseif($query->senha_usuario != $senha):
                    set_msg('errologin', 'Senha incorreta', 'erro');
                elseif($query->ativo_usuario == 0):
                    set_msg('errologin', 'Este usuario esta inativo "'.$usuario.'"', 'erro');
                else:
                    set_msg('errologin', 'Erro desconhecido, contate o desenvolvedor "'.$usuario.'"', 'erro');
                endif;
                redirect('login');
             endif;
        endif;
            //Carregando os stylus utilizados
            $css['header_meio'] = load_css( array(
                    'plugins/select2/css/select2.min',
                    'plugins/select2/css/select2-bootstrap.min'), 'global');
            $css['header_fim'] = load_css( array(
                    'css/components.min',
                    'css/plugins.min'), 'global');
            $css['header_fim'] .= load_css( array('css/login'), 'pages');
            // Carregando os javascripts utilizados
            $js['footer_meio'] = load_js( array(
                    'plugins/jquery-validation/js/jquery.validate.min',
                    'plugins/jquery-validation/js/additional-methods.min',
                    'plugins/select2/js/select2.full.min'),'global');
            $js['footer_fim'] = load_js( array('scripts/app.min'),'global');
            $js['footer_fim'] .= load_js(array('scripts/login.min'),'pages');
            //Chamada para extenção do core em core/MY_Loader.php
            $this->load->template_login('login',$css,$js);
    }

    public function logoff(){
        // auditoria('Logoff no sistema', 'Logoff efetuado com sucesso');
        $this->session->unset_userdata(array('user_id' => '', 'user_nome' => '', 'user_admin' => '', 'user_logado' => ''));
        $this->session->sess_destroy();
        set_msg('desloga', 'Logoff efetuado com sucesso', 'sucesso');
        $this->index();
        // redirect('login');
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */