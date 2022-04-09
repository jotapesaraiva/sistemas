<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema_model extends CI_Model {


    public function listar_sistema() {
        $query = $this->db->get('tb_sistema');
        return $query;
    }

    public function select_sistema() {
        $this->db->select("sis.*, GROUP_CONCAT(neg.nome_negocio SEPARATOR ' ') AS nome_negocio");
        $this->db->from('tb_sistema sis');
        $this->db->join('tb_area_negocio are', 'are.id_sistema = sis.id_sistema', 'left');
        $this->db->join('tb_negocio neg', 'neg.id_negocio = are.id_negocio', 'left');
        $this->db->group_by('sis.id_sistema');
        $query = $this->db->get();
        return $query;
    }

    public function save_sistema($dados) {
        $this->db->insert('tb_sistema', $dados);
        return $this->db->insert_id();
    }

    public function edit_sistema($id) {
        $this->db->where('id_sistema',$id);
        $query = $this->db->get('tb_sistema');
        return $query->row();
    }

    public function view_sistema($id) {
        $this->db->select('sis.*,
                          (CASE
                              WHEN sis.status_sistema = 0 THEN "Desativado"
                              WHEN sis.status_sistema = 1 THEN "Ativado"
                              ELSE "Desenvolvimento"
                          END) AS status_sis,
                          (CASE
                              WHEN sis.status_sistema = 0 THEN "danger"
                              WHEN sis.status_sistema = 1 THEN "success"
                              ELSE "info"
                          END) AS flag, DATE_FORMAT(sis.data_sistema,"%d/%m/%Y") AS data_sis,tsis.nome_tipo_sistema, neg.nome_negocio');
        $this->db->where('sis.id_sistema',$id);
        $this->db->join('tb_tipo_sistema tsis', 'tsis.id_tipo_sistema = sis.id_tipo_sistema', 'left');
        $this->db->join('tb_area_negocio an', 'an.id_sistema = sis.id_sistema', 'left');
        $this->db->join('tb_negocio neg', 'neg.id_negocio = an.id_negocio', 'left');
        $query = $this->db->get('tb_sistema sis');
        return $query->result();
    }

    public function update_sistema($where,$dados) {
        $this->db->update('tb_sistema', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_sistema($id) {
        $this->db->where('id_sistema',$id);
        $this->db->delete('tb_sistema');
    }

}

/* End of file Sistema_model.php */
/* Location: ./application/models/Sistema_model.php */