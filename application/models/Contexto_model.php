<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contexto_model extends CI_Model {

    public function listar_contexto() {
        $query = $this->db->get('tb_contexto');
        return $query;
    }

    public function consultar_contexto() {
        $this->db->where('nome_contexto','0');
        $query = $this->db->get('tb_contexto');
        return $query;
    }

    public function save_contexto($dados) {
        $this->db->insert('tb_contexto', $dados);
        return $this->db->insert_id();
    }

    public function edit_contexto($id) {
        $this->db->where('id_contexto',$id);
        $query = $this->db->get('tb_contexto');
        return $query->row();
    }

    public function update_contexto($where,$dados) {
        $this->db->update('tb_contexto', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_contexto($id) {
        $this->db->where('id_contexto',$id);
        $this->db->delete('tb_contexto');
    }

}

/* End of file Contexto_model.php */
/* Location: ./application/models/Contexto_model.php */