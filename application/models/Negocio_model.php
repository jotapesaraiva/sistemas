<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negocio_model extends CI_Model {

    public function listar_negocio() {
        $query = $this->db->get('tb_negocio');
        return $query;
    }

    public function consultar_negocio() {
        $this->db->where('nome_negocio','0');
        $query = $this->db->get('tb_negocio');
        return $query;
    }

    public function save_negocio($dados) {
        $this->db->insert('tb_negocio', $dados);
        return $this->db->insert_id();
    }

    public function edit_negocio($id) {
        $this->db->where('id_negocio',$id);
        $query = $this->db->get('tb_negocio');
        return $query->row();
    }

    public function update_negocio($where,$dados) {
        $this->db->update('tb_negocio', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_negocio($id) {
        $this->db->where('id_negocio',$id);
        $this->db->delete('tb_negocio');
    }

}

/* End of file negocio.php */
/* Location: ./application/models/negocio.php */