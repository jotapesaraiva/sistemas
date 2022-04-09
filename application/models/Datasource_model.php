<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasource_model extends CI_Model {

    public function listar_datasource() {
        $query = $this->db->get('tb_datasource');
        return $query;
    }

    public function list_datasource()
    {
        $this->db->select('ds.*, group_concat(clt.nome_cluster) as nome_cluster, wlc.nome_weblogic'); //, clust.nome_cluster');
        $this->db->from('tb_datasource ds');
        $this->db->join('tb_alvo_datasource ads', 'ds.id_datasource = ads.id_datasource');
        $this->db->join('tb_cluster clt', 'clt.id_cluster = ads.id_cluster');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = ds.id_weblogic');
        $this->db->group_by('ds.id_datasource');
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query;

        //SELECT id_datasource, group_concat(id_cluster) FROM tb_alvo_datasource GROUP BY id_datasource
    }

    public function consultar_datasource() {
        $this->db->select('data.*');
        $this->db->from('tb_datasource data');
        $query = $this->db->get();
        return $query;
    }

    public function save_datasource($dados) {
        $this->db->insert('tb_datasource', $dados);
        return $this->db->insert_id();
    }

    public function save_alvo($dados)
    {
        $this->db->insert('tb_alvo_datasource', $dados);
        return $this->db->insert_id();
    }

    public function edit_datasource($id) {
        $this->db->where('id_datasource',$id);
        $query = $this->db->get('tb_datasource');
        return $query->row();
    }

    public function edit_alvo($id)
    {
        $this->db->select('id_cluster');
        $this->db->where('id_datasource',$id);
        $query = $this->db->get('tb_alvo_datasource');
        return $query->result();
    }


    public function view_datasource($id) {
        $this->db->select('ds.*, clt.nome_cluster ,wlc.nome_weblogic');
        $this->db->from('tb_datasource ds');
        $this->db->join('tb_alvo_datasource ads', 'ads.id_datasource = ds.id_datasource');
        $this->db->join('tb_cluster clt', 'clt.id_cluster = ads.id_cluster');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = ds.id_weblogic', 'left');
        $this->db->where('ads.id_cluster',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_datasource($where,$dados) {
        $this->db->update('tb_datasource', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_datasource($id) {
        $this->db->where('id_datasource',$id);
        $this->db->delete('tb_datasource');
    }

    public function delete_alvo($id)
    {
        $this->db->where('id_datasource', $id);
        $this->db->delete('tb_alvo_datasource');
    }

}

/* End of file Datasource_model.php */
/* Location: ./application/models/Datasource_model.php */