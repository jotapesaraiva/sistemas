<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auditoria_model extends CI_Model{

    public function do_insert($dados=NULL, $redir=FALSE){
        if ($dados != NULL):
            $this->db->insert('tb_auditoria', $dados);
            if ($this->db->affected_rows()>0):
                set_msg('msgok', 'Cadastro efetuado com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao inserir dados','erro');
            endif;
            if ($redir) redirect(current_url());
        endif;
    }

     public function get_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id_auditoria', $id);
            $this->db->limit(1);
            return $this->db->get('tb_auditoria');
        else:
            return FALSE;
        endif;
    }

    public function get_all($limit=0){
        if ($limit > 0) $this->db->limit($limit);
        return $this->db->get('tb_auditoria');
    }

}


/* End of file auditoria_model.php  */
/* Location: ./aplication/models/auditoria_model.php */