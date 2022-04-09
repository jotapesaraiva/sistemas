<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {

    public function listar_perfil() {
        $query = $this->db->get('tb_perfil');
        return $query;
    }

    public function consultar_perfil() {
        $this->db->where('nome_perfil','0');
        $query = $this->db->get('tb_perfil');
        return $query;
    }

    public function save_perfil($dados) {
        $this->db->insert('tb_perfil', $dados);
        return $this->db->insert_id();
    }

    public function edit_perfil($id) {
        $this->db->where('id_perfil',$id);
        $query = $this->db->get('tb_perfil');
        return $query->row();
    }

    public function update_perfil($where,$dados) {
        $this->db->update('tb_perfil', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_perfil($id) {
        $this->db->where('id_perfil',$id);
        $this->db->delete('tb_perfil');
    }


}

/* End of file Perfil_model.php */
/* Location: ./application/models/Perfil_model.php */