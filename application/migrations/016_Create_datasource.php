<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_datasource extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_datasource` (
             `id_datasource` int(11) NOT NULL AUTO_INCREMENT,
             `id_weblogic` int(11) NOT NULL,
             `nome_datasource` varchar(255) DEFAULT NULL,
             `tipo_datasource` varchar(255) DEFAULT NULL,
             `jndi_datasource` varchar(255) DEFAULT NULL,
             `usuario_datasource` varchar(255) DEFAULT NULL,
             `string_url_datasource` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_datasource`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_datasource');
    }

}

/* End of file 016_Create_datasource.php */
/* Location: ./application/migrations/016_Create_datasource.php */