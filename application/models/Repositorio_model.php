<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repositorio_model extends CI_Model {

    public function listar_repositorio() {
        $query = $this->db->get('tb_repositorio');
        return $query;
    }

    public function consultar_repositorio() {
        $this->db->where('nome_repositorio','0');
        $query = $this->db->get('tb_repositorio');
        return $query;
    }

    public function save_repositorio($dados) {
        $this->db->insert('tb_repositorio', $dados);
        return $this->db->insert_id();
    }

    public function edit_repositorio($id) {
        $this->db->where('id_repositorio',$id);
        $query = $this->db->get('tb_repositorio');
        return $query->row();
    }

    public function update_repositorio($where,$dados) {
        $this->db->update('tb_repositorio', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_repositorio($id) {
        $this->db->where('id_repositorio',$id);
        $this->db->delete('tb_repositorio');
    }

}

/* End of file Repositorio_model.php */
/* Location: ./application/models/Repositorio_model.php */