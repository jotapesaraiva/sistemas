<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_servico extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_servico` (
             `id_servico` int(11) NOT NULL AUTO_INCREMENT,
             `id_sistema` int(11) NOT NULL,
             `id_weblogic` int(11) NOT NULL,
             `nome_servico` varchar(255) NOT NULL,
             `versao_servico` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_servico`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_servico');
    }

}

/* End of file 009_Create_servico.php */
/* Location: ./application/migrations/009_Create_servico.php */