<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
// sendo usado pelo controller auditoria
    public function do_insert($dados=NULL, $redir=TRUE){
        if ($dados != NULL):
            $this->db->insert('tb_usuario', $dados);
            if ($this->db->affected_rows()>0):
                auditoria('Inclusao de usuarios','Usuario " '.$dados['login_usuario'].' " cadastrado no sistema');
                set_msg('msgok', 'Cadastro efetuado com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao inserir dados','erro');
            endif;
            if ($redir) redirect(current_url());
        endif;
    }

    public function do_update($dados=NULL, $condicao=NULL, $redir=TRUE){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('tb_usuario', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                auditoria('Alteração de usuarios', 'Alterado cadastro do usuario " '.$dados['nome_usuario'].' " ');
                set_msg('msgok', 'Alteração efetuada com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao alterar dados','erro');
            endif;
            if ($redir) redirect(current_url());
        endif;
    }

    public function do_delete($condicao=NULL, $redir=TRUE){
        if ($condicao != NULL && is_array($condicao)):
            $this->db->delete('tb_usuario', $condicao);
            if ($this->db->affected_rows()>0):
                auditoria('Exclusão de usuarios', 'Excluido cadastro do usuario " '.$dados['login_usuario'].' " ');
                set_msg('msgok','Registro excluido com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao excluir registro','erro');
            endif;
            if ($redir) redirect(current_url());
        endif;
    }

    public function do_login($usuario=NULL, $senha=NULL){
        if($usuario && $senha):
            $this->db->where('login_usuario', $usuario);
            $this->db->where('senha_usuario', $senha);
            $this->db->where('ativo_usuario', 1);
            $query = $this->db->get('tb_usuario');
            if ($query->num_rows == 1):
                return TRUE;
            else:
                return FALSE;
            endif;
        else:
            return FALSE;
        endif;
    }
// sendo usado no controller login
    public function get_bylogin($login=NULL){
        if ($login != NULL):
            $this->db->where('login_usuario', $login);
            $this->db->limit(1);
            return $this->db->get('tb_usuario');
        else:
            return FALSE;
        endif;
    }

    public function get_byemail($email=NULL){
        if ($email != NULL):
            $this->db->where('email_usuario', $email);
            $this->db->limit(1);
            return $this->db->get('tb_usuario');
        else:
            return FALSE;
        endif;
    }
// sendo usado no controller auditoria
     public function get_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id_usuario', $id);
            $this->db->limit(1);
            return $this->db->get('tb_usuario');
        else:
            return FALSE;
        endif;
    }
// sendo usado no controller auditoria
        public function get_all(){
        return $this->db->get('tb_usuario');
    }

    public function update_usuario($where,$dados) {
        $this->db->update('tb_usuario', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_usuario($id) {
        $this->db->where('id_usuario',$id);
        $this->db->delete('tb_usuario');
    }

// sendo usado pelo controller usuarios
    public function listar_usuario()
    {
        $this->db->select('usu.*, per.nome_perfil');
        $this->db->from('tb_usuario usu');
        $this->db->join('tb_perfil per', 'per.id_perfil = usu.id_perfil');
        return $this->db->get();
    }
//sendo usado pelo controller login
    public function insert_usuario($save) {
        // $this->db = $this->load->database('default',true); //connected with mysql
        // Query to check whether username already exist or not
        $query = $this->get_bylogin($save['login_usuario']);
        if ($query->num_rows() == 1) :
            // Query to insert data in database
            $update = array(
                'nome_usuario' => $save['nome_usuario'],
                'email_usuario' => $save['email_usuario'],
                'login_usuario' => $save['login_usuario'],
                'senha_usuario' => $save['senha_usuario'],
                'ativo_usuario' => $query->row()->ativo_usuario,
                'id_perfil' => $query->row()->id_perfil
            );
            $this->db->where('id_usuario', $query->id_usuario);
            $this->db->update('tb_usuario', $update);
            if ($this->db->affected_rows() > 0):
                auditoria('Alteração de usuarios','Alterado cadastro do usuario " '.$save['nome_usuario'].' " ');
                return true;
            endif;
            $query = $this->usuarios->get_bylogin($save['login_usuario'])->row();
            $dados = array(
                    'user_id'     => $query->id_usuario,
                    'user_nome'   => $query->nome_usuario,
                    'user_admin'  => $query->id_perfil,
                    'user_logado' => TRUE,
                );
            $this->session->set_userdata($dados);
        else :
            // Query to insert data in database
            $this->db->insert('tb_usuario', $save);
            $query = $this->usuarios->get_bylogin($save['login_usuario'])->row();
            $dados = array(
                    'user_id'     => $query->id_usuario,
                    'user_nome'   => $query->nome_usuario,
                    'user_admin'  => $query->id_perfil,
                    'user_logado' => TRUE,
                );
            $this->session->set_userdata($dados);
            auditoria('Inclusao de usuarios', 'Usuario " '.$save['login_usuario'].' " cadastrado no sistema');
            return false;
        endif;
    }

}


/* End of file usuarios_model.php  */
/* Location: ./aplication/models/usuarios_model.php */