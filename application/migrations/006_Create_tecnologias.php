<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tipo_sistema extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_tipo_sistema` (
             `id_tipo_sistema` int(11) NOT NULL AUTO_INCREMENT,
             `nome_tipo_sistema` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_tipo_sistema`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    $data = array (
        array('id_tipo_sistema' => '1', 'nome_tipo_sistema' => 'Java'),
        array('id_tipo_sistema' => '2', 'nome_tipo_sistema' => 'Vbscript'),
        array('id_tipo_sistema' => '3', 'nome_tipo_sistema' => 'Apache'),
        array('id_tipo_sistema' => '4', 'nome_tipo_sistema' => 'Joomla'),
        array('id_tipo_sistema' => '5', 'nome_tipo_sistema' => 'Wordpress'),
        array('id_tipo_sistema' => '6', 'nome_tipo_sistema' => 'Java Web'),
        array('id_tipo_sistema' => '7', 'nome_tipo_sistema' => 'PHP'),
    );

    $this->db->insert_batch('tb_tipo_sistema', $data);

    public function down() {
        $this->dbforge->drop_table('tb_tipo_sistema');
    }

}

/* End of file 019_Create_tipo_sistema.php */
/* Location: ./application/migrations/019_Create_tipo_sistema.php */
