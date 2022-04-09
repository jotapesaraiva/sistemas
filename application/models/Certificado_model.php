<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificado_model extends CI_Model {

    public function listar_certificado() {
        $query = $this->db->get('tb_certificado');
        return $query;
    }

    public function select_certificado() {
        $this->db->select('cer.*, tip.nome_tipo_certificado');
        $this->db->from('tb_certificado cer');
        $this->db->join('tb_tipo_certificado tip', 'tip.id_tipo_certificado = cer.id_tipo_certificado');
        $query = $this->db->get();
        return $query;
    }

    public function save_certificado($dados) {
        $this->db->insert('tb_certificado', $dados);
        return $this->db->insert_id();
    }

    public function edit_certificado($id) {
        $this->db->where('id_certificado',$id);
        $query = $this->db->get('tb_certificado');
        return $query->row();
    }

    public function update_certificado($where,$dados) {
        $this->db->update('tb_certificado', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_certificado($id) {
        $this->db->where('id_certificado',$id);
        $this->db->delete('tb_certificado');
    }

}

/* End of file Certificado_model.php */
/* Location: ./application/models/Certificado_model.php */