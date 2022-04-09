<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_model extends CI_Model {

    public function listar_link() {
        $query = $this->db->get('tb_link');
        return $query;
    }

    public function modal_link() {
        $query = $this->db->get('tb_link');
        return $query->result_array();
    }

    public function consultar_link($id) {
        $this->db->where('id_sistema',$id);
        $this->db->join('tb_link_sistema lks', 'lks.id_link = lnk.id_link', 'left');
        $query = $this->db->get('tb_link lnk');
        return $query;
    }

    public function save_link($dados) {
        $this->db->insert('tb_link', $dados);
        return $this->db->insert_id();
    }

    public function edit_link($id) {
        $this->db->where('id_link',$id);
        $query = $this->db->get('tb_link');
        return $query->row();
    }

    public function update_link($where,$dados) {
        $this->db->update('tb_link', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_link($array_link) {
        $id_link = array();
        if(!empty($array_link)){
            foreach ($array_link as $value) {
                $id_link[] = $value['id_link'];
            }
                $this->db->where_in('id_link', $id_link);
                $this->db->delete('tb_link');
            }
    }

    public function consultar_link_sistema($id) {
        $this->db->select('id_link');
        $this->db->where('id_sistema',$id);
        $query = $this->db->get('tb_link_sistema');
        return $query;
    }

    public function save_link_sistema($dados) {
        $this->db->insert('tb_link_sistema', $dados);
        return $this->db->insert_id();
    }

    public function delete_link_sistema($id)
    {
        $this->db->where('id_sistema',$id);
        $this->db->delete('tb_link_sistema');
    }

}

/* End of file Link_model.php */
/* Location: ./application/models/Link_model.php */