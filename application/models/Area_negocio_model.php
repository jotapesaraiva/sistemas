<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_negocio_model extends CI_Model {

    public function listar_area_negocio() {
        $query = $this->db->get('tb_area_negocio');
        return $query;
    }

    public function listar_negocio() {
        $query = $this->db->get('tb_negocio');
        return $query;
    }

    public function consultar_area_negocio_sistema($id) {
        $this->db->select('id_negocio');
        $this->db->where('id_sistema',$id);
        $query = $this->db->get('tb_area_negocio');
        return $query;
    }
    public function consultar_area_negocio() {
        $this->db->where('nome_area_negocio','0');
        $query = $this->db->get('tb_area_negocio');
        return $query;
    }

    public function save_area_negocio($dados) {
        $this->db->insert('tb_negocio', $dados);
        return $this->db->insert_id();
    }

    public function edit_area_negocio($id) {
        $this->db->where('id_negocio',$id);
        $query = $this->db->get('tb_negocio');
        return $query->row();
    }

    public function update_area_negocio($where,$dados) {
        $this->db->update('tb_negocio', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_area_negocio($id) {
        $this->db->where('id_negocio',$id);
        $this->db->delete('tb_negocio');
    }

    public function deletar_sistema($id)
    {
        $this->db->where('id_sistema', $id);
        $this->db->delete('tb_area_negocio');
    }

}

/* End of file Area_negocio_model.php */
/* Location: ./application/models/Area_negocio_model.php */