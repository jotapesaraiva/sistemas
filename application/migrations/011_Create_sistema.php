<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_sistema extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_sistema` (
           `id_sistema` int(11) NOT NULL AUTO_INCREMENT,
           `id_tipo_sistema` int(11) NOT NULL,
           `nome_sistema` varchar(255) NOT NULL,
           `descricao_sistema` text DEFAULT NULL,
           `data_sistema` date NOT NULL COMMENT 'data de implementação',
           `status_sistema` tinyint(1) NOT NULL DEFAULT 0
           PRIMARY KEY (`id_sistema`),
           KEY `tb_sistema_FK` (`id_area_negocio`),
           CONSTRAINT `tb_sistema_FK` FOREIGN KEY (`id_area_negocio`) REFERENCES `tb_area_negocio` (`id_area_negocio`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_sistema');
    }

}

/* End of file 011_Create_sistema.php */
/* Location: ./application/migrations/011_Create_sistema.php */