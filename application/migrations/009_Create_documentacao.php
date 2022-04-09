<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_documentacao extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_documentacao` (
             `id_documentacao` int(11) NOT NULL AUTO_INCREMENT,
             `id_sistema` int(11) NOT NULL,
             `url_documentacao` varchar(255) DEFAULT NULL,
             `id_repositorio` int(11) NOT NULL,
             PRIMARY KEY (`id_documentacao`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_documentacao');
    }

}

/* End of file 010_Create_documentacao.php */
/* Location: ./application/migrations/010_Create_documentacao.php */