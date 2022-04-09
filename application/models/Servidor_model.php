<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servidor_model extends CI_Model {

    public function listar_servidor() {
        $query = $this->db->get('tb_servidor');
        return $query;
    }

    public function select_servidor() {
        $this->db->select('ser.*, am.nome_ambiente, con.nome_contexto, tec.nome_tecnologia');
        $this->db->from('tb_servidor ser');
        $this->db->join('tb_ambiente am', 'am.id_ambiente = ser.id_ambiente', 'left');
        $this->db->join('tb_contexto con', 'con.id_contexto = ser.id_contexto', 'left');
        $this->db->join('tb_tecnologias tec', 'tec.id_tecnologia = ser.id_tecnologia', 'left');
        $query = $this->db->get();
        return $query;
    }

    public function save_servidor($dados) {
        $this->db->insert('tb_servidor', $dados);
        return $this->db->insert_id();
    }

    public function edit_servidor($id) {
        $this->db->where('id_servidor',$id);
        $query = $this->db->get('tb_servidor');
        return $query->row();
    }

    public function update_servidor($where,$dados) {
        $this->db->update('tb_servidor', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_servidor($id) {
        $this->db->where('id_servidor',$id);
        $this->db->delete('tb_servidor');
    }


}

/* End of file Servidor_model.php */
/* Location: ./application/models/Servidor_model.php */