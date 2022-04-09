<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cluster extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_cluster` (
             `id_cluster` int(11) NOT NULL AUTO_INCREMENT,
             `id_weblogic` int(11) NOT NULL,
             `nome_cluster` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_cluster`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_cluster');
    }

}

/* End of file 021_Create_cluster.php */
/* Location: ./application/migrations/021_Create_cluster.php */