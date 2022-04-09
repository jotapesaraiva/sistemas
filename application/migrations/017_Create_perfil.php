<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_perfil extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
        CREATE TABLE `tbl_perfil` (
          `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
          `nome_perfil` varchar(100) NOT NULL,
          PRIMARY KEY (`id_perfil`)
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
    }");

        $this->db->insert_batch('tb_perfil', $data);
    }

    public function down() {
        $this->dbforge->drop_table('tb_perfil');
    }

}

/* End of file 017_Create_perfil.php */
/* Location: ./application/migrations/017_Create_perfil.php */