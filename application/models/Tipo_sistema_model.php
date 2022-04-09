<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_sistema_model extends CI_Model {

    public function listar_tipo_sistema() {
        $query = $this->db->get('tb_tipo_sistema');
        return $query;
    }

    public function modal_tipo_sistema() {
        $query = $this->db->get('tb_tipo_sistema');
        return $query->result_array();
    }

    public function consultar_tipo_sistema() {
        $this->db->where('nome_tipo_sistema','0');
        $query = $this->db->get('tb_tipo_sistema');
        return $query;
    }

    public function save_tipo_sistema($dados) {
        $this->db->insert('tb_tipo_sistema', $dados);
        return $this->db->insert_id();
    }

    public function edit_tipo_sistema($id) {
        $this->db->where('id_tipo_sistema',$id);
        $query = $this->db->get('tb_tipo_sistema');
        return $query->row();
    }

    public function update_tipo_sistema($where,$dados) {
        $this->db->update('tb_tipo_sistema', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_tipo_sistema($id) {
        $this->db->where('id_tipo_sistema',$id);
        $this->db->delete('tb_tipo_sistema');
    }



}

/* End of file Tipo_sistema_model.php */
/* Location: ./application/models/Tipo_sistema_model.php */