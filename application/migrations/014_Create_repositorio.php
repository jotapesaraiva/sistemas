<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_repositorio extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_repositorio` (
             `id_repositorio` int(11) NOT NULL AUTO_INCREMENT,
             `nome_repositorio` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_repositorio`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
        $data = array(
            array('id_repositorio' => '1', 'nome_repositorio' => 'GitLab'),
            array('id_repositorio' => '2', 'nome_repositorio' => 'GED'),
            array('id_repositorio' => '3', 'nome_repositorio' => 'Wki'),
            array('id_repositorio' => '4', 'nome_repositorio' => 'Redmine')
        );

        $this->db->insert_batch('tb_repositorio', $data);
    }

    public function down() {
        $this->dbforge->drop_table('tb_repositorio');
    }

}

/* End of file 014_Create_repositorio.php */
/* Location: ./application/migrations/014_Create_repositorio.php */