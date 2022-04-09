<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_link_sistema extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_link_sistema` (
             `id_sistema` int(11) NOT NULL,
             `id_link` int(11) NOT NULL,
             PRIMARY KEY (`id_sistema`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_link_sistema');
    }

}

/* End of file 024_Create_link_sistema.php */
/* Location: ./application/migrations/024_Create_link_sistema.php */