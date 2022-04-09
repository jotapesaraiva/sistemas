<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster_model extends CI_Model {

    public function listar_cluster() {
        $this->db->select('clt.*, wlc.nome_weblogic');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = clt.id_weblogic', 'left');
        $query = $this->db->get('tb_cluster clt');
        return $query;
    }

    public function select_cluster() {
        $this->db->select("distinct(nome_cluster)");
        $this->db->from('tb_cluster');
        $this->db->group_by('nome_cluster');
        // $this->db->last_query();
        $query = $this->db->get();
        return $query;
    }

    public function consultar_cluster() {
        #$this->db->select("clu.*, GROUP_CONCAT(mana.nome_managed_server SEPARATOR ' ') AS nome_managed_server");
        $this->db->select('clt.*, wlc.nome_weblogic');
        $this->db->from('tb_cluster clt');
        // $this->db->join('tb_managed_server ms', 'ms.id_cluster = clt.id_cluster');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = clt.id_weblogic', 'left');
        // $this->db->group_by('clu.id_cluster');
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query;
        // SELECT clt.*, ms.nome_managed_server, wlc.nome_weblogic FROM tb_cluster clt JOIN tb_managed_server ms ON ms.id_cluster = clt.id_cluster JOIN tb_weblogic wlc ON ms.id_weblogic = wlc.id_weblogic

    }

    public function save_cluster($dados) {
        $this->db->insert('tb_cluster', $dados);
        return $this->db->insert_id();
    }

    public function save_alvo_s($dados) {
        $this->db->insert('tb_alvo_cluster', $dados);
        return $this->db->insert_id();
    }

    public function delete_alvo($id)
    {
        $this->db->where('id_servico',$id);
        $this->db->delete('tb_alvo_cluster');
    }

    public function edit_cluster($id) {
        $this->db->where('id_cluster',$id);
        $query = $this->db->get('tb_cluster');
        return $query->row();
    }

    public function view_cluster($id,$amb)
    {
        $this->db->select('clt.nome_cluster');
        $this->db->from('tb_cluster clt');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = clt.id_weblogic');
        $this->db->where('clt.id_cluster',$id);
        $this->db->where('wlc.id_ambiente',$amb);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_cluster($where,$dados) {
        $this->db->update('tb_cluster', $dados, $where);
        // echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    public function delete_cluster($id) {
        $this->db->where('id_cluster',$id);
        $this->db->delete('tb_cluster');
    }


    // SELECT distinct(concat(clu.nome_cluster, " - ",contexto.nome_contexto)) cluster
    // FROM tb_cluster clu JOIN tb_managed_server mana ON mana.id_cluster = clu.id_cluster
    // JOIN tb_servidor servidor ON servidor.id_servidor = mana.id_servidor
    // JOIN tb_contexto contexto ON servidor.id_contexto = contexto.id_contexto



}

/* End of file Cluster_model.php */
/* Location: ./application/models/Cluster_model.php */