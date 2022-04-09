<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_alvo_cluster extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_alvo_cluster` (
             `id_cluster` int(11) NOT NULL,
             `id_servico` int(11) NOT NULL,
             PRIMARY KEY (`id_alvo_datasource`,`id_cluster`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_alvo_cluster');
    }

}

/* End of file 022_Create_alvo_cluster.php */
/* Location: ./application/migrations/022_Create_alvo_cluster.php */