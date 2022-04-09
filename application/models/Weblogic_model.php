<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weblogic_model extends CI_Model {

    public function listar_weblogic() {
        $query = $this->db->get('tb_weblogic');
        return $query;
    }

    public function select_weblogic() {
        $this->db->select('wlc.*, am.nome_ambiente, con.nome_contexto, tec.nome_tecnologia, svd.hostname_servidor, svd.ip_servidor');
        $this->db->from('tb_weblogic wlc');
        $this->db->join('tb_ambiente am', 'am.id_ambiente = wlc.id_ambiente');
        $this->db->join('tb_contexto con', 'con.id_contexto = wlc.id_contexto');
        $this->db->join('tb_tecnologias tec', 'tec.id_tecnologia = wlc.id_tecnologia');
        $this->db->join('tb_servidor svd', 'svd.id_servidor = wlc.id_servidor');
        $query = $this->db->get();
        return $query;
    }

    public function save_weblogic($dados) {
        $this->db->insert('tb_weblogic', $dados);
        return $this->db->insert_id();
    }

    public function edit_weblogic($id) {
        $this->db->where('id_weblogic',$id);
        $query = $this->db->get('tb_weblogic');
        return $query->row();
    }

    public function update_weblogic($where,$dados) {
        $this->db->update('tb_weblogic', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete_weblogic($id) {
        $this->db->where('id_weblogic',$id);
        $this->db->delete('tb_weblogic');
    }

}

/* End of file weblogic_model.php */
/* Location: ./application/models/weblogic_model.php */