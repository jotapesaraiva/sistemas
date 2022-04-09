<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnologia_model extends CI_Model {

    public function listar_tecnologia() {
        $query = $this->db->get('tb_tecnologias');
        return $query;
    }

    public function consultar_tecnologia() {
        $this->db->where('nome_tecnologia','0');
        $query = $this->db->get('tb_tecnologias');
        return $query;
    }

    public function save_tecnologia($dados) {
        $this->db->insert('tb_tecnologias', $dados);
        return $this->db->insert_id();
    }

    public function edit_tecnologia($id) {
        $this->db->where('id_tecnologia',$id);
        $query = $this->db->get('tb_tecnologias');
        return $query->row();
    }

    public function update_tecnologia($where,$dados) {
        $this->db->update('tb_tecnologias', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_tecnologia($id) {
        $this->db->where('id_tecnologia',$id);
        $this->db->delete('tb_tecnologias');
    }

}

/* End of file Tecnologia_model.php */
/* Location: ./application/models/Tecnologia_model.php */