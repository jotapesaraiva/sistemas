<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_managed_server extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_managed_server` (
             `id_managed_server` int(11) NOT NULL AUTO_INCREMENT,
             `id_weblogic` int(11)DEFAULT NULL,
             `id_cluster` int(11)DEFAULT NULL,
             `nome_managed_server` varchar(255) DEFAULT NULL,
             `status_managed_server`  tinyint(1) NOT NULL DEFAULT '1',
             `argumento_managed_server` varchar(255) DEFAULT NULL,
             `memoria_managed_server` int(11) DEFAULT NULL,
             `versao_java_managed_server` varchar(255) DEFAULT NULL,
             `porta_managed_server` int(11) DEFAULT NULL,
             PRIMARY KEY (`id_managed_server`)
         ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_managed_server');
    }

}

/* End of file 009_Create_managed_server.php */
/* Location: ./application/migrations/009_Create_managed_server.php */