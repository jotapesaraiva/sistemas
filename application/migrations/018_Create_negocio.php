<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_negocio extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_negocio` (
             `id_negocio` int(11) NOT NULL AUTO_INCREMENT,
             `nome_negocio` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_negocio`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_negocio');
    }

}

/* End of file 018_Create_negocio.php */
/* Location: ./application/migrations/018_Create_negocio.php */