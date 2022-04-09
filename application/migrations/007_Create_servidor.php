<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_servidor extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_servidor` (
             `id_servidor` int(11) NOT NULL AUTO_INCREMENT,
             `id_certificador` int(11) DEFAULT NULL,
             `ip_servidor` int(11) DEFAULT NULL,
             `so_servidor` int(11) DEFAULT NULL,
             `hostname_servidor` varchar(255) DEFAULT NULL,
             `memoria_servidor` varchar(255) DEFAULT NULL,
             `processador_servidor` varchar(255) DEFAULT NULL,
             `dominio_servidor` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_servidor`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_servidor');
    }

}

/* End of file 007_Create_servidor.php */
/* Location: ./application/migrations/007_Create_servidor.php */