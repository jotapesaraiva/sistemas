<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managed_server_model extends CI_Model {

    public function listar_managed_server() {
        $query = $this->db->get('tb_managed_server');
        return $query;
    }

    public function select_managed_server() {
        $this->db->select("distinct(nome_managed_server)");
        $this->db->from('tb_managed_server');
        $this->db->group_by('nome_managed_server');
        // $this->db->last_query();
        $query = $this->db->get();
        return $query;
    }

    public function consultar_managed_server() {
        $this->db->select('ms.*, wlc.nome_weblogic, clt.nome_cluster');
        $this->db->from('tb_managed_server ms');
        $this->db->join('tb_weblogic wlc', 'ms.id_weblogic = wlc.id_weblogic', 'left');
        $this->db->join('tb_cluster clt', 'clt.id_cluster = ms.id_cluster', 'left');
        $query = $this->db->get();
        return $query;
    }

    public function save_managed_server($dados) {
        $this->db->insert('tb_managed_server', $dados);
        return $this->db->insert_id();
    }

    public function edit_managed_server($id) {
        $this->db->where('id_managed_server',$id);
        $query = $this->db->get('tb_managed_server');
        return $query->row();
    }

    public function view_managed_server($id,$amb)
    {
        $this->db->select('mns.*, IF(mns.status_managed_server = 1, "checked", "") as status_mn, wlc.nome_weblogic');
        $this->db->from('tb_managed_server mns');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = mns.id_weblogic', 'left');
        $this->db->where_in('id_cluster',$id);
        $this->db->where('wlc.id_ambiente',$amb);
        $query = $this->db->get();
        return $query->result();
    }

    public function view_weblogic($id)
    {
        $this->db->select('DISTINCT(mns.id_weblogic),wlc.nome_weblogic');
        $this->db->from('tb_managed_server mns');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = mns.id_weblogic');
        $this->db->where('mns.id_cluster', $id);
        $this->db->order_by('mns.id_weblogic', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_managed_server($where,$dados) {
        $this->db->update('tb_managed_server', $dados, $where);
        // echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    public function delete_managed_server($id) {
        $this->db->where('id_managed_server',$id);
        $this->db->delete('tb_managed_server');
    }



}

/* End of file Managed_server.php */
/* Location: ./application/models/Managed_server.php */