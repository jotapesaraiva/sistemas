<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//seta um registro na tabela de auditoria
function auditoria($operacao, $obs, $query=TRUE){
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->model('auditoria_model', 'auditoria');
    if (esta_logado(FALSE)):
        $user_id = $CI->session->userdata('user_id');
        $user_login = $CI->usuarios->get_byid($user_id)->row()->login_usuario;
    else:
         $user_login = 'Desconhecido';
    endif;
    if($query):
        $last_query = $CI->db->last_query();
    else:
        $last_query = ' ';
    endif;
    $dados = array(
        'usuario_auditoria' => $user_login,
        'operacao_auditoria' => $operacao,
        'query_auditoria' => $last_query,
        'observacao_auditoria' => $obs,
        );
    $CI->auditoria->do_insert($dados);
}
/* End of file auditoria_helper.php */
/* Location: ./application/helpers/auditoria_helper.php */
 ?>
