<?php defined('BASEPATH') OR exit('No direct script access allowed');

    //verifica se o usuario esta logado no sistema
if ( ! function_exists('esta_logado')){

    function esta_logado($redir=TRUE) {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->library('auth_ad');
        $CI->load->model('usuarios_model');
        $user_status = $CI->auth_ad->is_authenticated(); //verifica a session logged_in
        if (!isset($user_status) || $user_status != TRUE):
            $CI->session->sess_destroy();
            if ($redir):
                $CI->session->set_userdata(array('redir_para'=>current_url()));
                set_msg('loginErro','Efetue o login para acessar o sistema','erro');
                redirect('login');
            else:
                return FALSE;
            endif;
        else:
            return TRUE;
            // $group = $CI->usuarios_model->usuario_grupo($CI->session->userdata('username'));
            // if($CI->auth_ad->level_access($CI->uri->segment(2),$group->nome_grupo)):
            //     $username = $CI->session->userdata('username');
            //     return TRUE;
            // else:
            //     set_msg('loginErro','Você não tem acesso a esse modulo.','erro');
            //     $referred_from = $this->session->userdata('referred_from');
            //     redirect($referred_from, 'refresh');
            // endif;
        endif;
    }

}

//nivel de acesso admin
if ( ! function_exists('admin')){

    function admin() {
        $CI =& get_instance();
        $CI->load->library('session');

        $perfil = $CI->session->userdata('user_admin'); //verifica a session logged_in
        if ($perfil >= 1) :
            return TRUE;
        else:
            return FALSE;
        endif;
    }

}

//nivel de acesso super_admin
if ( ! function_exists('super_admin')){

    function super_admin() {
        $CI =& get_instance();
        $CI->load->library('session');

        $perfil = $CI->session->userdata('user_admin'); //verifica a session logged_in
        if ($perfil > 1) :
            return TRUE;
        else:
            return FALSE;
        endif;
    }

}

/* End of file access_helper.php */
/* Location: ./application/helpers/access_helper.php */
