<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico_model extends CI_Model {

    public function listar_servico() {
        $query = $this->db->get('tb_servico');
        return $query;
    }

    public function select_servico() {
        $this->db->select('svc.*, sis.nome_sistema, clt.nome_cluster, wlc.nome_weblogic');
        $this->db->from('tb_servico svc');
        $this->db->join('tb_sistema sis', 'sis.id_sistema = svc.id_sistema', 'left');
        $this->db->join('tb_alvo_cluster tac', 'tac.id_servico = svc.id_servico');
        $this->db->join('tb_cluster clt', 'clt.id_cluster = tac.id_cluster', 'left');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = svc.id_weblogic', 'left');
        // echo $this->db->last_query();
        $query = $this->db->get();
        return $query;
    }

    public function save_servico($dados) {
        $this->db->insert('tb_servico', $dados);
        return $this->db->insert_id();
    }

    public function save_alvo($dados)
    {
        $this->db->insert('tb_alvo_cluster', $dados);
        return $this->db->insert_id();
    }

    public function edit_servico($id) {
        $this->db->where('id_servico',$id);
        $query = $this->db->get('tb_servico');
        return $query->row();
    }

    public function edit_alvo($id)
    {
        $this->db->select('id_cluster');
        $this->db->where('id_servico',$id);
        $query = $this->db->get('tb_alvo_cluster');
        return $query->result();
    }

    public function view_servico($id,$amb) {
        $this->db->select('svc.id_servico,svc.nome_servico, svc.versao_servico , wlc.nome_weblogic, clt.nome_cluster, clt.id_cluster');
        $this->db->from('tb_servico svc');
        $this->db->join('tb_alvo_cluster aclt', 'aclt.id_servico = svc.id_servico');
        $this->db->join('tb_cluster clt', 'clt.id_cluster = aclt.id_cluster');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = svc.id_weblogic');
        $this->db->where('svc.id_sistema',$id);
        $this->db->where('wlc.id_ambiente',$amb);
        // $this->db->order_by('svc.id_weblogic', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    // SELECT DISTINCT svc.id_weblogic, wlc.nome_weblogic
    // FROM tb_servico svc
    // JOIN tb_weblogic wlc ON svc.id_weblogic = wlc.id_weblogic
    // WHERE svc.id_sistema = 12
    // AND  wlc.id_ambiente = 4
    // ORDER BY svc.id_weblogic ASC

    public function view_servico_cluster($id,$amb){
        $this->db->select('DISTINCT(clt.id_cluster)');
        $this->db->from('tb_servico svc');
        $this->db->join('tb_alvo_cluster aclt', 'aclt.id_servico = svc.id_servico');
        $this->db->join('tb_cluster clt', 'clt.id_cluster = aclt.id_cluster');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = svc.id_weblogic');
        $this->db->where('svc.id_sistema',$id);
        $this->db->where('wlc.id_ambiente',$amb);
        $query = $this->db->get();
        return $query->result();
    }

    public function view_weblogic($id,$amb)
    {
        $this->db->select('DISTINCT(svc.id_weblogic),wlc.nome_weblogic');
        $this->db->from('tb_servico svc');
        $this->db->join('tb_weblogic wlc', 'wlc.id_weblogic = svc.id_weblogic');
        $this->db->where('svc.id_sistema', $id);
        $this->db->where('wlc.id_ambiente',$amb);
        $this->db->order_by('svc.id_weblogic', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_servico($where,$dados) {
        $this->db->update('tb_servico', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_servico($id) {
        $this->db->where('id_servico',$id);
        $this->db->delete('tb_servico');
    }

}

/* End of file Servico_model.php */
/* Location: ./application/models/Servico_model.php */