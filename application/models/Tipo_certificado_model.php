<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_certificado_model extends CI_Model {

    public function listar_tipo_certificado() {
        $query = $this->db->get('tb_tipo_certificado');
        return $query;
    }

    public function consultar_tipo_certificado() {
        $this->db->where('nome_tipo_certificado','0');
        $query = $this->db->get('tb_tipo_certificado');
        return $query;
    }

    public function save_tipo_certificado($dados) {
        $this->db->insert('tb_tipo_certificado', $dados);
        return $this->db->insert_id();
    }

    public function edit_tipo_certificado($id) {
        $this->db->where('id_tipo_certificado',$id);
        $query = $this->db->get('tb_tipo_certificado');
        return $query->row();
    }

    public function update_tipo_certificado($where,$dados) {
        $this->db->update('tb_tipo_certificado', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_tipo_certificado($id) {
        $this->db->where('id_tipo_certificado',$id);
        $this->db->delete('tb_tipo_certificado');
    }



}

/* End of file Tipo_certificado_model.php */
/* Location: ./application/models/Tipo_certificado_model.php */