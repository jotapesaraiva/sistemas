<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentacao_model extends CI_Model {

    public function modal_documentacao() {
        $this->db->select('doc.*, repo.nome_repositorio');
        $this->db->from('tb_documentacao doc');
        $this->db->join('tb_repositorio repo', 'doc.id_repositorio = repo.id_repositorio');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function listar_documentacao()
    {
        $query = $this->db->get('tb_documentacao');
        return $query;
    }

    public function consultar_documentacao_sistema($id) {
        $this->db->where('id_sistema',$id);
        $query = $this->db->get('tb_documentacao');
        return $query;
    }

    public function consultar_documentacao() {
        $this->db->where('nome_documentacao','0');
        $query = $this->db->get('tb_documentacao');
        return $query;
    }

    public function view_documentacao($id)
    {
        $this->db->select('doc.url_documentacao, rpt.nome_repositorio');
        $this->db->from('tb_documentacao doc');
        $this->db->join('tb_repositorio rpt', 'rpt.id_repositorio = doc.id_repositorio');
        $this->db->where('id_sistema', $id);
        $query = $this->db->get();
        return $query->result();
    }


    public function save_documentacao($dados) {
        $this->db->insert('tb_documentacao', $dados);
        return $this->db->insert_id();
    }

    public function edit_documentacao($id) {
        $this->db->where('id_documentacao',$id);
        $query = $this->db->get('tb_documentacao');
        return $query->row();
    }

    public function update_documentacao($where,$dados) {
        $this->db->update('tb_documentacao', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_documentacao($id) {
        $this->db->where('id_documentacao',$id);
        $this->db->delete('tb_documentacao');
    }

    public function deletar_sistema($id)
    {
        $this->db->where('id_sistema', $id);
        $this->db->delete('tb_documentacao');
    }

}

/* End of file Documentacao_model.php */
/* Location: ./application/models/Documentacao_model.php */