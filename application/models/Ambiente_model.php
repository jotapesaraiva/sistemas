<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambiente_model extends CI_Model {

    public function listar_ambiente() {
        $query = $this->db->get('tb_ambiente');
        return $query;
    }

    public function consultar_ambiente() {
        $this->db->where('nome_ambiente','0');
        $query = $this->db->get('tb_ambiente');
        return $query;
    }

    public function save_ambiente($dados) {
        $this->db->insert('tb_ambiente', $dados);
        return $this->db->insert_id();
    }

    public function edit_ambiente($id) {
        $this->db->where('id_ambiente',$id);
        $query = $this->db->get('tb_ambiente');
        return $query->row();
    }

    public function update_ambiente($where,$dados) {
        $this->db->update('tb_ambiente', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_ambiente($id) {
        $this->db->where('id_ambiente',$id);
        $this->db->delete('tb_ambiente');
    }

}

/* End of file Ambiente_model.php */
/* Location: ./application/models/Ambiente_model.php */